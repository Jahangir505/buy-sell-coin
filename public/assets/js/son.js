

class sons{

    status=false;

    son=document.querySelector("#son");

    constructor(){
        

        document.addEventListener("click",()=>{

            this.status=true;
        })

        let request=null;

        if(window.XMLHttpRequest)
        {
            request=new XMLHttpRequest();
        }

        else if(window.ActiveXObject)
        {
            try{
                request=new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e){

                try{
                    request=new ActiveXObject("Microsoft.XMLHTTP");
                } catch(e){}
            }
    
        }

        
        setInterval(()=>{check(request,this.status)},2000)

        let end=0

        this.son.addEventListener("ended",()=>{

            end++;

            if(end>=6)
            {
                this.son.pause();
                this.son.currentTime=0;
            }
        })
            
        

                
    }

    
}


new sons;


function check(requet,can){

    let son=document.querySelector("#son");

    let form=new FormData();
    
    form.append('test',"");
    form.append('_token','{{ csrf_token() }}');
    form.append('csrf','{{ csrf_token() }}');
    

    requet.open("GET","/probuyson");

    

    requet.onreadystatechange=()=>{

        if(requet.readyState==4)
        {
            if(requet.status==200)
            {
                let resp=JSON.parse(requet.response);

                console.log(resp);
                if(resp.b>0 || resp.s>0 || resp.w>0){

                    if(can){son.play();}

                    var modal = $('#notifyModal');

                    modal.modal('show');

                    document.querySelector("#buy-link .number").textContent=resp.b;
                    document.querySelector("#sell-link .number").textContent=resp.s;
                    document.querySelector("#withdrawal-link .number").textContent=resp.w;

                    $('#notifyModal .close').on("click",function(){

                        if(can){
                            son.pause();
                            son.currentTime=0;
                        }
                    })

                    
                }
            }
            
        }
    }
    
    requet.send(form);
}

