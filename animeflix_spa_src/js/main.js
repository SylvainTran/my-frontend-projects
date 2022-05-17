$(document).ready(setup);
function setup() {
    $('#form--admin-register-new').mousemove( () => {
        validateAdminOps();
    });
}

function toggleAddFilmForm(show){
    if(show) {
        // Vider la page
        $('#content-container').html("");
        $('#form--admin-register-new').show();
    } else {
        $('#form--admin-register-new').hide();
    }
}
function validateAdminForm() {
    let title=document.getElementById('admin__modify-product--title');    
    let author=document.getElementById('admin__modify-product--author');
    let desc=document.getElementById('admin__modify-product--desc');
    let price=document.getElementById('admin__modify-product--price');
    let category=document.getElementById('admin__modify-product--category');
    let releaseDate=document.getElementById('admin__modify-product--releaseDate');
    let duration=document.getElementById('admin__modify-product--duration');
    let cover=document.getElementById('admin__modify-product--cover');
    let previewUrl=document.getElementById('admin__modify-product--previewUrl');
    // Test for empty or null fields
    let testContainer=[];
    testContainer.push(title,author,desc,price,category,releaseDate,duration,cover,previewUrl);
    let testLength=testContainer.length;
    for(let i=0;i<testLength;i++) {
        let test=testContainer[i].value;
        if(test===""||test===undefined||test===null||test.length===0||!test.trim()) {
            return false;
        }
    }
    // Test for integer values (with decimals too) could be a different input type later
    let integerPattern=/^(\d)+((\.|,)?(\d)+)?$/;
    let integerRegExp=new RegExp(integerPattern);
    let priceValid,durationValid=false;
    let integersValid=false;
    if(integerRegExp.test(price.value)) {
        price.classList.remove("is-invalid");
        price.classList.add("is-valid");
        priceValid=true;
    } else {
        price.classList.remove("is-valid");
        price.classList.add("is-invalid");   
        priceValid=false; 
    }
    if(integerRegExp.test(duration.value)) {
        duration.classList.remove("is-invalid");
        duration.classList.add("is-valid");
        durationValid=true;
    } else {
        duration.classList.remove("is-valid");
        duration.classList.add("is-invalid");    
        durationValid=false;
    }
    if(priceValid && durationValid) integersValid=true;
    // Preview url test
    // Starting with "https://www.youtube.com/embed/1+ chars a-zA-Z0-9_
    let previewUrl_pattern=/^(http|https)(:\/\/www.youtube.com\/embed\/)(\w)+$/;
    let previewUrlRegExp=new RegExp(previewUrl_pattern);
    let previewUrlValidation=false;
    if(previewUrlRegExp.test(previewUrl.value)) {
        // Change the html validator styling
        previewUrl.classList.remove("is-invalid");
        previewUrl.classList.add("is-valid");
        previewUrlValidation=true;
    } else {
        previewUrl.classList.remove("is-valid");
        previewUrl.classList.add("is-invalid");    
        previewUrlValidation=false;
    }
    if(integersValid && previewUrlValidation) return true;
}
/**
 * 
 * Validate the admin modify and register operations using regexp.
 * 
 */
function validateAdminOps() {
    let adminModifyBt=document.getElementsByClassName('admin-modify-bt');
    if(validateAdminForm()) {
        for(let i=0;i<adminModifyBt.length;i++) {
            adminModifyBt[i].disabled=false;
        }
        //adminModifyBt.disabled = false;
        return true;
    }
    for(let i=0;i<adminModifyBt.length;i++) {
        adminModifyBt[i].disabled=true;
    }
    //adminModifyBt.disabled = true;
    return false;
}