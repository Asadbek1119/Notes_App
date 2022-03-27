import httpClient from "./http.service";


const notesService = {
    create(note) {
        return httpClient.post('note/create', note)
    },
    get() {
        return httpClient.get('note/index?sort=-created_at')
    },
    update(note) {
        return httpClient.put(`note/update?id=${note.id}`, note)
    },
    delete(noteId) {
        return httpClient.delete(`note/delete?id=${noteId}`)
    }
};

export default notesService;