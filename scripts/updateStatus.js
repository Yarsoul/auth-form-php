async function updateStatus(value, user_id) {
    document.getElementById('my_link_'+user_id).href = '?update=' + [value, user_id];
}