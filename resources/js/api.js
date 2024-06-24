// api.js
class MusixmatchAPI {
    constructor(apiKey) {
        this.apiKey = apiKey;
        this.baseURL = 'https://api.musixmatch.com/ws/1.1/';
    }

    async searchTracks(lyrics, page = 1, pageSize = 7) {
        const url = `${this.baseURL}track.search?q_lyrics=${encodeURIComponent(lyrics)}&apikey=${this.apiKey}&page_size=${pageSize}&page=${page}&format=json`;
        console.log('Request URL:', url); // Debugging output
        const response = await fetch(url);
        const data = await response.json();
        console.log('API Response:', data); // Debugging output
        return data.message.body.track_list || [];
    }
}

export default MusixmatchAPI;
