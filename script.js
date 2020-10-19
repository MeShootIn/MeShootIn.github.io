window.onload = () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    if (urlParams.has('url')) {
        location.href = urlParams.get('url');
    }
};