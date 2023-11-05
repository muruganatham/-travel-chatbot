
function envoyer() {
    $.ajax({
              type: "POST",
              url: "/chatbot",
              data: {
                  question: $("#question").val()
              },
    success: function(result) {
        let msgUser = $("#question").val()
        CreateUserMsg(msgUser)


          setTimeout(() => {
        if (result[1] == "listes_hotels")
        {
            CreateListe(result[0])
        }
        else if(result[1] == "listes_hotels_piscine")
        {
            CreateListe(result[0])
        }
         else if(result[1] == "places_images")
        {
            GererImages(result[2])
        }
         else if(result[1] == "5stars")
        {
            CreateListe(result[0])
        }
          else if(result[1] == "4stars")
        {
            CreateListe(result[0])
        }
          else if(result[1] == "3stars")
        {
            CreateListe(result[0])
        }
         else if(result[1] == "aeroport_hotels")
        {
            CreateListe(result[0])
        }
         else if(result[1] == "listes_restaurants")
        {
            CreateListe(result[0])
        }

         else if(result[1] == "roomsprice")
        {
            CreateBotMsg("Please choce the type of room:")
            CreateListe(result[0])
        }

         else if(result[1] == "list_places")
        {
            CreateListe(result[0])
        }
         else if(result[1] == "list_places_museum")
        {
            CreateListe(result[0])
        }
         else if(result[1] == "list_places_natural")
        {
            CreateListe(result[0])
        }
          else if(result[1] == "list_places_souk")
        {
            CreateListe(result[0])
        }
          else if(result[1] == "downtown_places")
        {
            CreateListe(result[0])
        }
          else if(result[1] == "downtown_hotels")
        {
            CreateListe(result[0])
        }

          else if(result[1] == "type1")
        {
            CreateListeChoice(result[0])
        }
          else if(result[1] == "service")
        {
            CreateListeChoice(result[0])
        }
           else if(result[1] == "type2")
        {
            CreateListeChoice(result[0])
        }
           else if(result[1] == "type3")
        {
            CreateListeChoice(result[0])
        }
           else if(result[1] == "type4")
        {
            CreateListeChoice(result[0])
        }
            else if(result[1] == "transport")
        {
            SeparSent(result[0])
        }
        else
        {
            CreateBotMsg(result[0])
        }
        }, 1000)

    },
    error: function(result) {alert("error");}
          })};

CreateListeChoice
// function for msg send by a user

function CreateUserMsg(msg)
{
    let msgUser = '<p class="userText"><span>' + msg + '</span></p>'
    $("#chatbox").append(msgUser);
    $("#question").val("")
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

}
// function for msg send by our Bot

function CreateBotMsg(msg)
{
    let  msgUser = '<p class="botText"><span>'+msg+'</span></p>'
    $("#chatbox").append(msgUser);
    $("#question").val("")
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

}

//Create Liste

function CreateListe(msg)
{

    let msgUser = "";
    for(let i=0;i<msg.length;i++)
    {
         msgUser = msgUser + '<span id="list" onclick = "OpenSession(this)">'+msg[i]+'</span>';

    }

    let rsp = '<p class="botText"><span style="background-color:#fff;">'+msgUser+'</span></p>'
    $("#chatbox").append(rsp);
    $("#question").val("")
    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}


// Get Timer

function getTime() {
    let today = new Date();
    hours = today.getHours();
    minutes = today.getMinutes();

    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    let time = hours + ":" + minutes;
    return time;
}
$("#chat-timestamp").append(getTime())

// Press icon send to send a message
$( "#chat-icon3" ).click(envoyer);




// Press enter to send a message
$("#question").keypress(function (e) {
    if (e.which == 13) {
        envoyer();
    }
});

// Open session

function OpenSession(msg)
{
    $("#question").val(msg.textContent);
}

//Crete Liste for choice

function CreateListeChoice(msg)
{
    let msgUser = "";
    for(let i=0;i<msg.length;i++)
    {
         msgUser = msgUser + '<li>'+msg[i]+'</li>';
         msgUser = msgUser + '<span id="choice"><li>'+msg[i]+'</li></span>';

    }

         let rsp = '<p class="botText"><span style="background-color:#fff;"><ul>'+msgUser+'</ul></span></p>'
         $("#chatbox").append(rsp);
         $("#question").val("")
         document.getElementById("chat-bar-bottom").scrollIntoView(true);

}


// Gestion for images
function GererImages(folder)
{
    for(let i=1; i<3;i++)
    {
        let msgUser = '<p class="botText"><span><a href="static/imagesAcc/'+folder+'/'+i+'.jpg" target="_blank"><img src="static/imagesAcc/'+folder+'/'+i+'.jpg" height="100px";"></a></span></p>'
        $("#chatbox").append(msgUser);

    }
     $("#question").val("")
     document.getElementById("chat-bar-bottom").scrollIntoView(true);

}


// transport

function SeparSent(msg)
{
        msgUser = ""
        for(let i=0; i<msg.length;i++)
        {
            msgUser = msgUser + msg[i] +'<br>'
        }

       let  res = '<p class="botText"><span>'+msgUser+'</span></p>'
       $("#chatbox").append(res);
       $("#question").val("")
       document.getElementById("chat-bar-bottom").scrollIntoView(true);

}

$("#chat-icon2").click(function()
{
    let rsp = '<p class="botText"><span style="background-color:#fff;">❤️</span></p>'
    let msgUser = '<p class="userText"><span style="text-align:right;background-color:#fff;"><img src="data:image/jpeg;base64,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"></span></p>'
    $("#chatbox").append(msgUser);
    $("#question").val("")
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

})