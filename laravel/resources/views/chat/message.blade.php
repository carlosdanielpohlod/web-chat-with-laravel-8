<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    {{-- <link rel='stylesheet' type='text/css' href='assets/css/style.css'> --}}
</head>
<body>
    <aside>
        {{-- <img src="assets/imgs/Icon ionic-ios-chatboxes.png" alt="Chat" title="Chat"/> --}}

        <form id="form">
            <input type="text" placeholder="Digite seu nome..." value="nome padrão" name="name" id="name" />
            <input type="text" placeholder="Digite sua mensagem..." value="Mensagem" name="message" id="message" />
        </form>

        <button id="btnSubmit">Enviar</button>
    </aside>

    <div id="content">
        
    </div>

    
</body>
</html>


<script>
    const conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        showMessages('other', e.data)
    };


    
</script>

<script>
    const formMessage = document.getElementById("form")
    const inputMessage = document.getElementById('message')
    const inputName = document.getElementById("name")
    const btnSubmit = document.getElementById("btnSubmit")
    const divContent = document.getElementById("content")

    function showMessages(how, msg){
        msg = JSON.parse(msg)
        // // if(how == 'me'){
          const imgProfile = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLfn6eqrsbTp6+zg4uOwtrnJzc/j5earsbW0uby4vcDQ09XGyszU19jd3+G/xMamCvwDAAAFLklEQVR4nO2d2bLbIAxAbYE3sDH//7WFbPfexG4MiCAcnWmnrzkjIRaD2jQMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMw5wQkHJczewxZh2lhNK/CBOQo1n0JIT74/H/qMV0Z7GU3aCcVPuEE1XDCtVLAhgtpme7H0s1N1U7QjO0L8F7llzGeh1hEG/8Lo7TUmmuSrOfns9xnGXpXxsONPpA/B6OqqstjC6Ax/0ujkNdYQQbKNi2k64qiiEZ+ohi35X+2YcZw/WujmslYewiAliVYrxgJYrdwUmwXsU+RdApUi83oNIE27YvrfB/ZPg8+BJETXnqh9CVzBbTQHgojgiCvtqU9thFJg/CKz3VIMKMEkIXxIWqIpIg2SkjYj+xC816mrJae2aiWGykxRNsW0UwiJghJDljYI5CD8GRiCtIsJxizYUPQ2pzItZy5pcisTRdk/a9m4amtNNfBuQkdVhSaYqfpNTSFGfb9GRIakrE2Pm+GFLaCQPqiu0OpWP+HMPQQcgQMiQprWXNmsVwIjQjYi/ZrhAqNTCgr2gu0Jnz85RSSjso0HkMFZ0YZjKkc26a/jlmh9JiDyDxi9oeorTYAzZkwwoMz19pzj9bnH/GP/+qbchjSGflneWYhtTuKdMOmNKZcJ5TjInQKcYXnESd/jQxy0ENpULTNGOGgxpap/oyw9pbUAqhfx2Dbkhovvfgz4iUzoM9+GlK6/Mh4q29hyC1mwro30hpVVLPF9wYQr71RazOeM5/cw81iBRD+A03aM9/C/obbrKjbYSpCmIVG3qT/Q8oeUo3Rz0IL7vI1tEbCB9pSiu8I/aV8x3Kg/BGWrWp4ZVs0nZfmAoEG4h/61yHYIJiFSl6Q0Vk6tTW1N8kYp8hdOkfHYYMXd2Qft+8CYwqYDSKvqIh+MCF8Wgca2u/cwdgeW3TtuVn6+1oBs3yLo5C2JpK6CvQzGpfUkz9UG/87gCsi5o2LIXolxN0FbwAsjOLEr+YJmXn7iR6N0BCt5p5cMxm7eAsfS+/CACQf4CTpKjzgkvr2cVarVTf96372yut7XLJ1sa7lv6VcfgYrWaxqr3Wlo1S6pvStr22sxOtTNPLzdY3nj20bPP+ejFdJYkLsjGLdtPBEbe/mr2bQKiXWJDroA+vtzc0p9aahuwqHMDYrQEXHEw9jwQl3drMpts9JBU1SdktPe5FBRdJQ6bwXBpa57ib2A8kukQDzMjh++Uo7Fo6Wd02Pkf4fknqoo4HtvAIjsqUcjx6DIPgWCaOML9rKI/oqD9/lgNrn+eF+p7j8tnzHBiR7+kdUGw/+V1Kzkc75mMy6U+FMaxjPibiM1U1uGM+puInHpmALZCgP4pt7i840MV8+0R1zPsRB6UTcqpizncYwZ89syDydfyWCwXB1l8/zRNGWbTG/GHKUm9AkxHMc/EGSk3z2+ArEhPEV5TUBLEvUGFcjEUH80J/jveTGOAJEljJbILWGQT3zRYiwuKsUXN1EEJAzBhRJFll7mBUG7KD8EqPkKekBREaL8hMDZLQSG6AQjtHPYmvTQnX0TtpC1SYCe2YdkkyLP3jj5BSbKiuR585eQhTgoje6yIb0Yb0C+mV6EYvebqw5SDy2WmubogZiF2AVxPC2FpDf8H2Q9QWo6IkjUxTWVEI3WY/wrCeSuqJ+eRWzXR/JXwgVjUMozbCOfoEZiSiKVGepqv5CJ8RyR4D7xBeamqa7z3BJ/z17JxuBPdv93d/a2Ki878MMAzDMAzDMAzDMAzDMF/KP09VUmxBAiI3AAAAAElFTkSuQmCC'
        // // }else{
        // //     const profile = 'data:image/jpeg;base64,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'
        // // }
        let div = document.createElement('div')
        div.setAttribute('class',how)
        

        let divText = document.createElement('div')
        divText.setAttribute('class','text')
        // divText.style = 'color:'+color

        const profilePic = document.createElement('img')
        profilePic.src = imgProfile
        profilePic.style = 'width:50px; height:50px'
        let h5 = document.createElement('h5')
        h5.textContent = msg.name +': '
        
        let p = document.createElement('p')
        p.textContent = msg.msg

        divText.appendChild(h5)
        divText.appendChild(p)

        div.appendChild(profilePic)
        div.appendChild(divText)

        divContent.appendChild(div)
    }


    btnSubmit.onclick = e =>{
        e.preventDefault()
        let msg = {'name': inputName.value,
                    'msg': inputMessage.value}
        msg = JSON.stringify(msg)                 
        inputMessage.value = ''
        conn.send(msg)
        showMessages('me', msg)
    }
    
</script>