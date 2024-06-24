import MusixmatchAPI from './api.js';

const apiKey = 'YOUR_MUSIXMATCH_API_KEY'; // Replace with your actual API key
const musixmatch = new MusixmatchAPI(apiKey);

document.addEventListener('DOMContentLoaded', () => {
    const searchForm = document.getElementById('search-form');
    const resultsContainer = document.getElementById('results-container');
    const paginationContainer = document.getElementById('pagination-container');

    searchForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const lyrics = document.getElementById('lyrics').value;
        const tracks = await musixmatch.searchTracks(lyrics);
        renderResults(tracks);
    });

    async function loadPage(page) {
        const lyrics = document.getElementById('lyrics').value;
        const tracks = await musixmatch.searchTracks(lyrics, page);
        renderResults(tracks, page);
    }

    function renderResults(tracks, currentPage = 1) {
        resultsContainer.innerHTML = '';
        if (tracks.length === 0) {
            resultsContainer.innerHTML = '<p>No results found</p>';
            return;
        }

        const table = document.createElement('table');
        table.className = 'min-w-full bg-white';
        table.innerHTML = `
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-purple-700">Artist</th>
                    <th class="py-2 px-4 bg-gray-200 text-purple-700">Album</th>
                    <th class="py-2 px-4 bg-gray-200 text-purple-700">Track</th>
                </tr>
            </thead>
            <tbody>
                ${tracks.map(track => `
                    <tr class="border-b border-green-100">
                        <td class="py-2 px-4">${track.track.artist_name}</td>
                        <td class="py-2 px-4">${track.track.album_name}</td>
                        <td class="py-2 px-4">${track.track.track_name}</td>
                    </tr>
                `).join('')}
            </tbody>
        `;
        resultsContainer.appendChild(table);

        // Render pagination (assuming total and perPage are available)
        renderPagination(currentPage, Math.ceil(tracks.length / 7)); // Adjust accordingly
    }

    function renderPagination(currentPage, totalPages) {
        paginationContainer.innerHTML = '';
        if (totalPages <= 1) return;

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.textContent = i;
            pageButton.className = `px-4 py-2 ${i === currentPage ? 'bg-purple-700 text-white' : 'bg-white text-purple-700'}`;
            pageButton.addEventListener('click', () => loadPage(i));
            paginationContainer.appendChild(pageButton);
        }
    }
});
