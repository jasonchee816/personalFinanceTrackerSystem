<!DOCTYPE html>
<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* {
			box-sizing: border-box;
		}

		/*create float*/
		.column {
			float: left;
			height: 400px;
			padding: 10px;
		}

		/* .left {
			width: 600px;
		}

		.right {
			margin-left : 30px;
			width: 600px;
			font-family: "Lucida Console", "Courier New", monospace;
		} */

		p {
			font-size: 15px;
		}

		h2,
		h3 {
			font-size: 25px;
		}

		/*To remove the float*/
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		img:hover {
			animation: shake 0.5s;
			animation-iteration-count: infinite;
		}

		@keyframes shake {
			0% {
				transform: translate(1px, 1px) rotate(0deg);
			}

			10% {
				transform: translate(-1px, -2px) rotate(-1deg);
			}

			20% {
				transform: translate(-3px, 0px) rotate(1deg);
			}

			30% {
				transform: translate(3px, 2px) rotate(0deg);
			}

			40% {
				transform: translate(1px, -1px) rotate(1deg);
			}

			50% {
				transform: translate(-1px, 2px) rotate(-1deg);
			}

			60% {
				transform: translate(-3px, 1px) rotate(0deg);
			}

			70% {
				transform: translate(3px, 1px) rotate(-1deg);
			}

			80% {
				transform: translate(-1px, -1px) rotate(1deg);
			}

			90% {
				transform: translate(1px, 2px) rotate(0deg);
			}

			100% {
				transform: translate(1px, -2px) rotate(-1deg);
			}
		}
	</style>
</head>

<body>





	<div>
		<h2 style="font-family:axial; font-size: 500%;">
			<center> LMEO </center>
		</h2>
		<p style="font-size:120%; text-align: center; font-size: 150%;">(Selangor) Sdn. Bhd.</p>

	</div>
	<div class="row">
		<div style="align-items: center; justify-content: center; display:flex;">
			<img src="../general/image/aboutImg.jpg" alt="Header" style="width: 1500px ; height: 600px;">
		</div>
		<div style="margin: 100px;">
			<h1 >Serious Software, Friendly Company.</h1>
			<p style="font-size: 180%;">
				Software is our craft and our passion. At LMEO, we create beautiful software to solve business problems. We believe that software is the ultimate product of the mind and the hands. 
				<br><br>
				But as much as we love building beautiful software, we think our people and company culture are our most important assets. Our engineers spend years mastering their craft, bringing together decades of engineering expertise to produce a real work of art. When you choose Zoho, you get more than just a single product or a tightly integrated suite. You get our commitment to continuous refinement and to improving your experience. And you get our relentless devotion to your satisfaction.
			</p>
		</div>
	</div>
</body>

</html>