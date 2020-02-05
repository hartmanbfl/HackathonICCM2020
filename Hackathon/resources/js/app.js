require('./bootstrap');
function confirmDelete(id, eventId) {
    if (confirm("Are you sure you want to delete this?")) {
        var url = "kategorieLoeschen.php?id=" + id + "&eventId=" + eventId;
//                    window.open(url);
//alert(url);
        window.location.href = url;
    }
}
