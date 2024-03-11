function uploadImg(event){
    // console.log(event);
    let file = event.target.files[0];
    if(file.type=='image/jpg' || file.type=='image/png' || file.type=='image/jpeg' || file.type=='image/webp' || file.type=='image/gif'){
        let imgBinary = URL.createObjectURL(file);
        document.getElementById('img-preview').innerHTML=`<img src='${imgBinary}' alt="no-image" height="110px" width="110px" class="img-thumbnail" />`;
        
    }

    
}

function updateImg(event){
    // console.log(event);
    let file = event.target.files[0];
    if(file.type=='image/jpg' || file.type=='image/png' || file.type=='image/jpeg' || file.type=='image/webp' || file.type=='image/gif'){
        let imgBinary = URL.createObjectURL(file);
        document.getElementById('img').src=`${imgBinary}`;
        
    }


}