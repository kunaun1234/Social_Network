var current_index = 0
var other
function FindfriendPage(){
    var container = document.getElementById("center")
    container.innerHTML=""
    input = document.createElement("input")
    input.classList.add("name")
    input.id = "name"
    btn = document.createElement("button")
    btn.classList.add("submit")
    btn.appendChild(document.createTextNode("search"))
    container.appendChild(input)
    container.appendChild(btn)
}
function getChat(){
    var container = document.getElementsByClassName("container")
    var block = document.createElement("div")
    block.classList.add("block_container")
    block.setAttribute("id","block_container")
    container[1].appendChild(block)
    //chat interface
    $.get("getchat.php",{name : other},function(data){
        
        data.forEach(function(item,index){
            if(current_index < index){
                if(user1 = item["send"]){
                block1 = document.createElement("div")
                name1 = document.createElement("div")
                image1 = document.createElement("img")
                text1 = document.createElement("div")
                time1 = document.createElement("div")
                textName1 = document.createTextNode(item["send"])
                name1.appendChild(textName1)
                name1.classList.add("user1")
                image1.classList.add("img1")
                textText1 = document.createTextNode(item["text"])
                text1.appendChild(textText1)
                text1.classList.add("text1")
                textTime1 = document.createTextNode(item["time"])
                time1.appendChild(textTime1)
                time1.classList.add("time1")
                block1.appendChild(name1)
                block1.appendChild(image1)
                block1.appendChild(text1)
                block1.appendChild(time1)
                block.appendChild(block1)
            }else{
                block2 = document.createElement("div")
                name2 = document.createElement("div")
                image2 = document.createElement("img")
                text2 = document.createElement("div")
                time2 = document.createElement("div")
                textName2 = document.createTextNode(item["send"])
                name2.appendChild(textName2)
                name2.classList.add("user2")
                image2.classList.add("img2")
                textText2 = document.createTextNode(item["text"])
                text2.appendChild(textText2)
                text2.classList.add("text2")
                textTime2 = document.createTextNode(item["time"])
                time2.appendChild(textTime2)
                time2.classList.add("time2")
                block2.appendChild(name2)
                block2.appendChild(image2)
                block2.appendChild(text2)
                block2.appendChild(time2)
                block.appendChild(block2)
            }
            current_index = index
            }
            
        })
    },"json");
    
}
function reloadChat(){
    
    var block = document.getElementById("block_container")
    setInterval(function(){
        $.get("getchat.php",{name : other},function(data){
        data.forEach(function(item,index){
            if(current_index < index){
                if(user1 = item["send"]){
                    block1 = document.createElement("div")
                    name1 = document.createElement("div")
                    image1 = document.createElement("img")
                    text1 = document.createElement("div")
                    time1 = document.createElement("div")
                    textName1 = document.createTextNode(item["send"])
                    name1.appendChild(textName1)
                    name1.classList.add("user1")
                    image1.classList.add("img1")
                    textText1 = document.createTextNode(item["text"])
                    text1.appendChild(textText1)
                    text1.classList.add("text1")
                    textTime1 = document.createTextNode(item["time"])
                    time1.appendChild(textTime1)
                    time1.classList.add("time1")
                    block1.appendChild(name1)
                    block1.appendChild(image1)
                    block1.appendChild(text1)
                    block1.appendChild(time1)
                    block.appendChild(block1)
                }else{
                    block2 = document.createElement("div")
                    name2 = document.createElement("div")
                    image2 = document.createElement("img")
                    text2 = document.createElement("div")
                    time2 = document.createElement("div")
                    textName2 = document.createTextNode(item["send"])
                    name2.appendChild(textName2)
                    name2.classList.add("user2")
                    textText2 = document.createTextNode(item["text"])
                    text2.appendChild(textText2)
                    text2.classList.add("text2")
                    image2.classList.add("img2")
                    textTime2 = document.createTextNode(item["time"])
                    time2.appendChild(textTime2)
                    time2.classList.add("time2")
                    block2.appendChild(name2)
                    block2.appendChild(image2)
                    block2.appendChild(text2)
                    block2.appendChild(time2)
                    block.appendChild(block2)
                }
                current_index = index
            }
        })     
        },"json");
    
    },1000)
}

function showChat(){
    var container = document.getElementsByClassName("container")
    container[1].innerHTML=""
    //chat interface
    var block = document.createElement("div")
    block.classList.add("F_input")
    var formss = document.createElement("from")
    var input = document.createElement("select")
    var submitBtn = document.createElement("input")
    submitBtn.setAttribute("type", "submit")
    submitBtn.setAttribute("value", "select")
    input.setAttribute("id", "name")
    submitBtn.classList.add("select")
    $.get("findFriend.php",{name : name},function(data){
        data.forEach(function(item,index){
            var option = document.createElement("option");
            option.value = item;
            option.text = item;
            input.appendChild(option);
        })
        
    },"json")

    formss.appendChild(input)
    formss.appendChild(submitBtn)
    block.appendChild(formss)
    container[1].appendChild(block)
}
function showSend(){
    var container = document.getElementsByClassName("container")
    var checkblock = document.getElementById("F_input")
    if(!checkblock){
        var block = document.createElement("div")
        block.classList.add("F_input")
        block.setAttribute("id", "F_input")
        var formss = document.createElement("from")
        var input = document.createElement("input")
        input.setAttribute("type", "text")
        input.setAttribute("id", "text")
        var submitBtn = document.createElement("input")
        submitBtn.setAttribute("type", "submit")
        submitBtn.setAttribute("value", "send")
        submitBtn.classList.add("send")
        formss.appendChild(input)
        formss.appendChild(submitBtn)
        block.appendChild(formss)
        container[1].appendChild(block)
    }
    reloadChat()
    

}
// $(document).on("click","#find",function() {
//     FindfriendPage()
// });
$(document).on("click",".select",function() {
    let name = document.getElementById("name").value
    other = name
    getChat()
    showSend()
});
$(document).on("click",".send",function() {
    let name = other
    let time = new Date()
    let Truetime = time.getHours()+":"+time.getMinutes()+":"+time.getSeconds()
    let text = document.getElementById("text").value
    $.get("chat.php",{name : name, time : Truetime, text : text},function(data){
    },"json")
});
$(document).ready(function(){
    showChat();
    
})