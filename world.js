document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.getElementById('lookup');
    const searchBar = document.getElementById('country');
    const result = document.getElementById('result');
    const cityBtn=document.getElementById('cities');



    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        var searchValue = searchBar.value;
        let httpReq = new XMLHttpRequest();
        let url = 'http://localhost:8888/info2180-lab5/world.php?country='+searchValue+'&lookup=country';
        httpReq.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                let response = httpReq.responseText;
                result.innerHTML=response;
                console.log(searchValue);
            }
        };
        httpReq.open('GET', url);
        httpReq.send();
    
     });

     cityBtn.addEventListener('click', function(e) {
        e.preventDefault();
        var searchValue = searchBar.value;
        let httpReq = new XMLHttpRequest();
        let url = 'http://localhost:8888/info2180-lab5/world.php?country='+searchValue+'&lookup=cities';
        httpReq.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                let response = httpReq.responseText;
                result.innerHTML=response;
                console.log(searchValue);
            }
        };
        httpReq.open('GET', url);
        httpReq.send();
    
     });

});
