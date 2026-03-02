// ambil parameter URL
const params = new URLSearchParams(window.location.search);
const signal = params.get("signal") || "ppg"; // default ppg

fetch("content.json")
  .then(res => res.json())
  .then(data => {

    const content = data[signal];

    document.getElementById("title").textContent = content.title;
    document.getElementById("video").src = content.video;
    document.getElementById("content").textContent = content.text;

  })
  .catch(err => console.error(err));
