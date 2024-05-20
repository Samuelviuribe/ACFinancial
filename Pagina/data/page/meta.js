const metaContent = document.querySelector("header");

var prePath = document.querySelector('meta[name="dir"]').getAttribute('content');
var titleSite = document.querySelector('meta[name="site"]').getAttribute('content');

var title = document.querySelector('title');

title.textContent = `AC Financial | ${titleSite}`

var link = document.querySelector("link[rel~='icon']");
link = document.createElement('link');
link.rel = 'icon';
document.head.appendChild(link);
link.href = `${prePath}data/img/icon_wh.png`;

var imgs = document.getElementsByTagName('img')

for (let index = 0; index < imgs.length; index++) {
    imgs[index].setAttribute("draggable", "false")
    imgs[index].setAttribute("copy", "silver02")
}



//console.log("meta loaded.");
