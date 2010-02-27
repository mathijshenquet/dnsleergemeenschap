window.onload = function() {
    var links = document.getElementsByTagName('a');
    for (var i=0;i < links.length;i++) {
        if (links[i].href.search('http://<?=$_SERVER["HTTP_HOST"];?>') == -1) {
            links[i].onclick = function() {
                window.open(this.href);
                return false;

            };
        }
        links[i].onfocus = function(){
             if(this.blur){
                this.blur();
             }
        }
    }
};

