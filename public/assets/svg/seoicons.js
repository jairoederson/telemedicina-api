var socialMediaIconNames = [
	"contentWritingIcon",
	"videoSearchIcon",
	"articleMarketingIcon",
	"voiceSearchIcon",
	"monitoringIcon",
	"seoTagsIcon",
	"pageSpeedIcon",
	"keywordResearchIcon",
	"payperClickIcon",
	"webDevelopmentIcon",
	"rankingIcon",
	"localSeoIcon",
	"siteArchitectureIcon",
	"seoPerformanceIcon",
	"customCodingIcon",
	"linkBuildingIcon",
	"mobileOptimizationIcon",
	"targetAudienceIcon",
	"emailmarketingIcon",
	"cloudStorageIcon"

];
//var socialMediaIconNames = ["chrome"];
iconNames = iconNames.concat(socialMediaIconNames);
var easeVar = Quad;
var linesToReset = [];
//animate each of the icons

window['monitoringIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, true]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['seoTagsIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, true]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['pageSpeedIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['keywordResearchIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['payperClickIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['rankingIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['localSeoIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['siteArchitectureIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['seoPerformanceIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['customCodingIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['linkBuildingIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['mobileOptimizationIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['emailmarketingIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['webDevelopmentIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['cloudStorageIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['targetAudienceIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['contentWritingIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['videoSearchIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['articleMarketingIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}

window['voiceSearchIcon'] = function(index, f, thisIcon)
{
	var tl = new TimelineLite({onStart:animationComplete, onStartParams:[index, true], onReverseComplete:animationComplete, onReverseCompleteParams:[index, false]})

	animateLines(f, 8, tl, 0, .4, .1, index);
	animateStars(f, 5, tl, .2);
	tls[index] = tl;
	var tlRollover = new TimelineLite();
	tlsRollover[index] = tlRollover;
}


function animateLines(f, pathCount, thisTl, startingTime, animationTime, timeBetween, index)
{

	var thisLinesToReset = [];
	for (var i = 0; i < pathCount; i++) {



		var fakeTweenObj = {currentLength:0};
		var thisPath = f.select("#path" + i);
		var pathLength = Snap.path.getTotalLength(thisPath);
		thisLinesToReset.push(thisPath);

		thisPath.attr({
			strokeDasharray:pathLength + " " + pathLength,
			strokeDashoffset:pathLength
		});
		thisTl.from(fakeTweenObj, animationTime, {ease:Quad.easeInOut,
			currentLength:pathLength,
			onUpdate:drawTheLine, onUpdateParams:[fakeTweenObj, thisPath]
		}, timeBetween * i);
		//thisTl.from(f.select("#star" + i).node, 1.5, {alpha:0, repeatDelay:1, repeat:-1, ease:Linear.easeNone, yoyo:true}, startingTime + timeBetween * i)


	};


		linesToReset[index] = thisLinesToReset;

}

function resetLines(thisIcon)
{

	if(linesToReset[thisIcon]){


		for (var i = 0; i < linesToReset[thisIcon].length; i++) {
			var thisPath = linesToReset[thisIcon][i];
			var pathLength = Snap.path.getTotalLength(thisPath);
			thisPath.attr({
				strokeDasharray:pathLength + " " + pathLength,
				strokeDashoffset:pathLength
			});
		}
	}
}

//this actually moves the lines during the tween above
function drawTheLine(fakeTweenObj, thisPath)
{
	thisPath.attr({
		strokeDashoffset:fakeTweenObj.currentLength
	});
}


function animateStars(f, starCount, thisTl, startingTime)
{
	var timeBetween = .1;
	for (var i = 1; i < starCount + 1; i++) {
		thisTl.from(f.select("#star" + i).node, 1.5, {alpha:0, repeatDelay:0.5, repeat:-1, ease:Linear.easeNone, yoyo:true}, startingTime + timeBetween * i)
	};

}
