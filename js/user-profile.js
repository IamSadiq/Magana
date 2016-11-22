/*document.getElementById("user-bio").innerHTML = "";
document.getElementById("user-bio").innerHTML = "He is a final year student of 
	Ghana Technology University College (GTUC) as a computer engineering 
	undergraduate major..";
*/

var clickCounter = 0, images = document.getElementsByName("img-name"), tmpObj;
mouseEventHandler();

//for-loop to add event listener to buttons//
function mouseEventHandler()
{
	for(var i=0; i<images.length; i++)
	{
		images[i].addEventListener('click',function()
		{
			++clickCounter;
			if(clickCounter === 1)
			{
				tmpObj = this;
				singleClickTimer = setTimeout(function(){

				resetSelection(images);
				singleClick(tmpObj);
				},400)

			}
			else if(clickCounter === 2)
			{
				//alert(t++);

				clearTimeout(singleClickTimer);
				doubleClick(objArray2);
			}
		});
	}

}

//function to deselect buttons on single click
function resetSelection(images)
{
	for(var j=0;j<images.length;j++)
	{
	images[j].style.backgroundColor='transparent';
	}
}

//single click
function singleClick(obj)
{
	/*SHOW USER OPTIONS TO DELETE, RENAME OR SET IMAGE AS PROFILE PIC*/
	obj.style.backgroundColor ='white';
	clickCounter=0;
}

//double-click
function doubleClick(newObjArr)
{
	/*VIEW LARGE PHOTO*/

	clickCounter=0;
}