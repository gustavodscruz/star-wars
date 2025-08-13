const starsContainer = document.getElementById("stars");
const numStars = 100;

for (let i = 0; i < numStars; i++) {
  const star = document.createElement("div");
  star.className = "star";
  star.style.left = Math.random() * 100 + "%";
  star.style.top = Math.random() * 100 + "%";
  star.style.animationDuration = 2 + Math.random() * 3 + "s";
  star.style.animationDelay = Math.random() * 3 + "s";
  starsContainer.appendChild(star);
}
