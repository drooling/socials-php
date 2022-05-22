function load_data() {
    let session = new XMLHttpRequest();
    session.open("GET", "https://ip-api.com/json/".replace('https', 'http'));
    session.send();

    session.onload = function () {
        const jobj = JSON.parse(session.responseText);
        document.getElementById("ipv4-address").textContent = jobj.query;
        document.getElementById("location").textContent = `Location: ${jobj.city}, ${jobj.regionName}, ${jobj.country}`;
        document.getElementById("provider").textContent = `Provider: ${jobj.isp}`;
    };
}
