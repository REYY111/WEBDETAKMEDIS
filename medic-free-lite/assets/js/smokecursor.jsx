import React from "react";

function SmokeCursor({ size = 30, duration = 800, blur = 8, opacity = 0.4 }) {

  React.useEffect(() => {

    const createSmokeParticle = (x, y) => {
      const particle = document.createElement("div");

      particle.classList.add("smoke-particle");

      particle.style.width = `${size}px`;
      particle.style.height = `${size}px`;
      particle.style.left = `${x - size / 2}px`;
      particle.style.top = `${y - size / 2}px`;
      particle.style.filter = `blur(${blur}px)`;
      particle.style.opacity = opacity;
      particle.style.animationDuration = `${duration}ms`;

      document.body.appendChild(particle);

      setTimeout(() => {
        particle.remove();
      }, duration);
    };

    const handleMouseMove = (e) => {
      createSmokeParticle(e.clientX, e.clientY);
    };

    window.addEventListener("mousemove", handleMouseMove);

    return () => {
      window.removeEventListener("mousemove", handleMouseMove);
    };

  }, [size, duration, blur, opacity]);

  return null;
}

export default SmokeCursor;
