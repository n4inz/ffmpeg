<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=”0; url=index.php” http-equiv=”refresh”>

    <title>ffmpeg</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
</head>
<body>


<div class="w-[65%] mx-auto pt-10">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex f -mb-px text-sm font-medium text-center w-full" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <div class="mr-2 w-1/2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Video to Audio</button>
            </div>
            <div class="mr-2 w-1/2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Audio to Video</button>
            </div>
        </div>
    </div>
    <div id="myTabContent">
        <div class="hidden p-4 rounded-lg  bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 loadSucessVideo">    
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload video</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">mp4, avi, mkf or flv (MAX. 10MB)</p>
                        </div>
                        <input id="dropzone-file" name="video" type="file"  class="hidden inputVideo" accept=".mp4, .avi, .mkv, .flv"  />
                    </label>
                </div> 
                <div class="load_btn">
                   
                    <button type="submit" name="video"  value="video" class="text-white mt-5 w-full bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Convert</button>
                </div>
            </form>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delay Images</label>
                    <input type="number" name="delay" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Delay" required>
                </div>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file-audios" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 loadSucessAudios">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload audio</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">mp3, mpa, wma or waf (MAX. 10MB)</p>
                        </div>
                        <input id="dropzone-file-audios" name="audios" type="file" class="hidden inputAudios" accept=".mp3, .mpa, .wma, .waf"/>
                    </label>
                </div> 

                <div class="flex flex-wrap justify-evenly load_input">
                    
                    <div class="flex items-center justify-center w-56 mt-5">
                        <label for="dropzone-file-img-1" class="flex  flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 loadSucessImages">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload image</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">jpg, png, jpeg or tiff (MAX. 10MB)</p>
                            </div>
                            <input id="dropzone-file-img-1" name="images[]" type="file" class="text-[8px] h-16  inputImages" accept=".jpg, .png, .jpeg, .tiff" />
                        </label>
                    </div> 

                    <div class="load_inputs"></div>

                    <div class="flex items-center justify-center w-56 mt-5">
                        <label onclick="add_upload()" for="" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-32 h-32 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </label>
                    </div> 

                
                </div>



                <!-- <div class="flex items-center justify-center w-full mt-5">
                    <label for="dropzone-file-img-2" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 loadSucessImages">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload images</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">jpg, png, jpeg or tiff (MAX. 10MB)</p>
                        </div>
                        <input id="dropzone-file-img-2" name="images[]" type="file" class=" inputImages" accept=".jpg, .png, .jpeg, .tiff" />
                    </label>
                </div>  -->
    
                <button type="submit" name="audio"  value="audio" class="text-white mt-5 w-full bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Convert</button>
            </form>
        </div>
    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script>
    
    $('.inputVideo').change(function(){
        var fileName = $(this).val();
        fileName = fileName.replace(/C:\\fakepath\\/i, '');
        $('.loadSucessVideo').html(`<span class="font-bold text-xl">${fileName}</span>`);
        
    });

    $('.inputAudios').change(function(){
        var fileName = $(this).val();
        fileName = fileName.replace(/C:\\fakepath\\/i, '');
        $('.loadSucessAudios').html(`<span class="font-bold text-xl">${fileName}</span>`);
        
    });

    var  no = 1 ;
    function add_upload(){
        var temp = `<div class="flex items-center justify-center w-56 mt-5">
                        <label for="dropzone-file-img-${no}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 loadSucessImages">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload image</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">jpg, png, jpeg or tiff (MAX. 10MB)</p>
                            </div>
                            <input id="dropzone-file-img-${no}" name="images[]" type="file" class="text-[8px] h-16 inputImages" accept=".jpg, .png, .jpeg, .tiff" />
                        </label>
                    </div> `;

        $('.load_inputs').before(temp);
      

        no++;

        console.log(no);
       
    }

    // $('.inputImages').change(function(){
    //     var fileName = $(this).val();
    //     fileName = fileName.replace(/C:\\fakepath\\/i, '');
    //     $('.loadSucessImages').html(`<span class="font-bold text-xl">${fileName}</span>`);
        
    // });
</script>
</body>
</html>
