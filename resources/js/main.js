// main.js
import MusixmatchAPI from './api.js';

const apiKey = "6a5fa0b7ea788d0d6b94d4ce3263eb68"; // Replace with your actual API key
const musixmatch = new MusixmatchAPI(apiKey);

document.addEventListener('DOMContentLoaded', () => {
    const searchForm = document.getElementById('search-form');
    const resultsContainer = document.getElementById('results-container');
    const paginationContainer = document.getElementById('pagination-container');

    if (searchForm) {
        searchForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const lyrics = document.getElementById('lyrics').value;
            const tracks = await musixmatch.searchTracks(lyrics);
            renderResults(tracks);
        });
    }

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
        table.className = 'results-table';
        table.innerHTML = `
            <thead>
                <tr>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Track</th>
                </tr>
            </thead>
            <tbody>
                ${tracks.map(track => `
                    <tr>
                        <td>${track.track.artist_name}</td>
                        <td>${track.track.album_name}</td>
                        <td>${track.track.track_name}</td>
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
            pageButton.className = i === currentPage ? 'active' : '';
            pageButton.addEventListener('click', () => loadPage(i));
            paginationContainer.appendChild(pageButton);
        }
    }
});


