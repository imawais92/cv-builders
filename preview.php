const image = document.querySelector(".hotspots-image");
const canvas = document.getElementById("hover-canvas");
const ctx = canvas.getContext("2d");

// Assuming all .more-info-area elements are within a parent element with an ID "parent-container"
const parentContainer = document.getElementById("parent-container");

parentContainer.addEventListener("mouseenter", function (event) {
  if (event.target.classList.contains("more-info-area")) {
    console.log("function run");
    const coords = event.target.getAttribute("coords")
      .split(",")
      .map((coord) => parseInt(coord));
    console.log(coords);
    const x = coords[0];
    const y = coords[1];
    const width = coords[4] - coords[0];
    const height = coords[5] - coords[1];
    const borderWidth = 2; // Adjust the border width as needed

    canvas.style.top = `${y}px`;
    canvas.style.left = `${x}px`;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw the border
    ctx.strokeStyle = "rgba(0, 0, 0)";
    ctx.lineWidth = borderWidth;
    ctx.strokeRect(
      borderWidth / 2,
      borderWidth / 2,
      width - borderWidth,
      height - borderWidth
    );

    // Draw the filled rectangle
    ctx.fillStyle = "rgba(0, 0, 0, 0.5)";
    ctx.fillRect(
      borderWidth,
      borderWidth,
      width - 2 * borderWidth,
      height - 2 * borderWidth
    );

    canvas.style.display = "block";
  });
  
  parentContainer.addEventListener("mouseout", function (event) {
    if (event.target.classList.contains("more-info-area")) {
      canvas.style.display = "none";
    }
  });
});
