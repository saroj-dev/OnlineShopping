<?php 
    function popup($btnValue,$btnName,$title,$printImages,$features,$originalPrice,$discountedPrice,$key,$hiddenContent){
        echo "
            <div class=\"admin__popupContainer container bg-light py-4\">
                <form action=\"\" method=\"post\" enctype=\"multipart/form-data\">

                    <div class=\"admin__popupImageDiv\">
                    
                        <div class=\"custom-file-container\" data-upload-id=\"myUniqueUploadId\">
                            <label>Upload Images</label>
                            <label class=\"custom-file-container__custom-file\">
                                <input type=\"file\" onchange=\"console.log(upload.cachedFileArray)\" name=\"images[]\" class=\"custom-file-container__custom-file__custom-file-input\" accept=\"image//*\" multiple aria-label=\"Choose File\">
                                <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"10485760\" />
                                <span class=\"custom-file-container__custom-file__custom-file-control\"></span>
                            </label>
                            <a href=\"javascript:void(0)\" class=\"my-2 custom-file-container__image-clear btn btn-light d-block ml-auto btn btn-outline-danger\" role=\"button\" title=\"Clear Image\">Delete all</a>
                            <div class=\"custom-file-container__image-preview\"  style=\"overflow-x:hidden;\">
                                $printImages
                            </div>
                        </div>
                    
                    
                    </div>

                    <div class=\"admin__titleDiv\">
                        <div class=\"form-group\">
                            <label for=\"title\">Title:</label>
                            <input type=\"text\" name=\"title\" value=\"$title\" class=\"form-control\" id=\"title\" placeholder=\"Product title\">
                        </div>
                    </div>

                    $hiddenContent

                    <div class=\"admin__featuresDiv\">
                        <div class=\"form-group\">
                            <label for=\"features\">Features:</label>
                            <textarea name=\"features\" class=\"form-control\" id=\"features\" rows=\"3\">$features</textarea>
                        </div>
                    </div>

                    <div class=\"admin__popupPriceDiv form-row\">

                        <div class=\"admin__popupOriginalPrice form-group col-md-6\">
                            <label for=\"originalprice\">Original Price: </label>
                            <input name=\"originalPrice\" value=\"$originalPrice\" type=\"text\" class=\"form-control\" id=\"originalprice\" />
                        </div>
                        <div class=\"admin__popupDiscountPrice form-group col-md-6\">
                            <label for=\"afterdiscount\">Price after Discount:</label>
                            <input name=\"discountedPrice\" value=\"$discountedPrice\" type=\"text\" class=\"form-control\" id=\"afterdiscount\" />
                        </div>
                    </div>

                    <div class=\"admin__keysDiv\">
                        <div class=\"form-group\">
                            <label for=\"keys\">Keywords:</label>
                            <input type=\"text\" name=\"key\" value=\"$key\" class=\"form-control\" id=\"keys\" placeholder=\"Some related keywords\">
                        </div>
                    </div>

                    <div class=\"admin__buttons py-1 my-2 text-right\">
                    <button class=\"btn btn-secondary\" type=\"button\" onclick=\"removePopup()\">Cancel</button>
                    <button type=\"submit\" class=\"btn btn-primary px-3 mx-2\" name=\"$btnName\">$btnValue</button>
                    </div>
                </form>
        </div>
        <script> 
            var upload = new FileUploadWithPreview('myUniqueUploadId')
        </script>
        ";
    }        
        
        
        

?>
