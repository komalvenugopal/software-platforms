<!DOCTYPE html>
<html>
<head>
  <title>Canvas Animal Drawing</title>
</head>
<body>
  <h1>Simple Cat Drawing</h1>
  <canvas id="animalCanvas" width="400" height="400"></canvas>
  
  <script>
    // Get canvas and context
    const canvas = document.getElementById('animalCanvas');
    const ctx = canvas.getContext('2d');

    // Draw body
    ctx.fillStyle = '#FFD700';
    ctx.beginPath();
    ctx.moveTo(100, 200);
    ctx.bezierCurveTo(100, 100, 300, 100, 300, 200);
    ctx.bezierCurveTo(300, 300, 100, 300, 100, 200);
    ctx.closePath();
    ctx.fill();

    // Draw head
    ctx.fillStyle = '#FFD700';
    ctx.beginPath();
    ctx.arc(200, 100, 40, 0, Math.PI * 2, true);
    ctx.closePath();
    ctx.fill();

    // Draw eyes
    ctx.fillStyle = '#000';
    ctx.beginPath();
    ctx.arc(190, 90, 5, 0, Math.PI * 2, true);
    ctx.closePath();
    ctx.fill();

    ctx.beginPath();
    ctx.arc(210, 90, 5, 0, Math.PI * 2, true);
    ctx.closePath();
    ctx.fill();

    // Draw mouth
    ctx.beginPath();
    ctx.moveTo(200, 110);
    ctx.bezierCurveTo(200, 110, 190, 120, 210, 120);
    ctx.strokeStyle = "#000";
    ctx.stroke();

    // Draw tail
    ctx.beginPath();
    ctx.moveTo(300, 200);
    ctx.bezierCurveTo(300, 200, 350, 150, 320, 100);
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#FFD700';
    ctx.stroke();

  </script>
</body>
</html>
