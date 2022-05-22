function load_data() {
    let session = new XMLHttpRequest();
    session.open("GET", "https://ipapi.co/json/");
    session.send();

    session.onload = function () {
        const jobj = JSON.parse(session.responseText);
        document.getElementById("ipv4-address").textContent = jobj.ip;
        document.getElementById("location").textContent = `Location: ${jobj.city}, ${jobj.region}, ${jobj.country}`;
        document.getElementById("provider").textContent = `Provider: ${jobj.org}`;
    };
}
