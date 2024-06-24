class MusixmatchAPI {
    constructor(apiKey) {
        this.apiKey = apiKey;
        this.baseURL = 'https://api.musixmatch.com/ws/1.1/';
    }

    async searchTracks(lyrics, page = 1, pageSize = 7) {
        const url = `${this.baseURL}track.search?q_lyrics=${encodeURIComponent(lyrics)}&apikey=${this.apiKey}&page_size=${pageSize}&page=${page}&format=json`;
        const response = await fetch(url);
        const data = await response.json();
        return data.message.body.track_list || [];
    }
}

export default MusixmatchAPI;
