window.onload = () => {
    const queryString = window.location.search;

    location.href = queryString.substring(5);
};