window.onload = () => {
    const queryString = window.location.search;
    console.log(queryString);

    if (queryString.includes('url')) {
        location.href = queryString.substring(5);
    }
};