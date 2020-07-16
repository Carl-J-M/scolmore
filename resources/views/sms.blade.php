<html>
      <body>
         <form action='' method='post' action="create">
              @csrf
                      @if($errors->any())
              <ul>
             @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
             @endforeach
        @endif

        @if( session( 'success' ) )
             {{ session( 'success' ) }}
        @endif

             <label>Phone number:</label>
             <input type='number' name='numbers' maxlength="11"/>

            <label>Message</label>
            <textarea name='message' maxlength="140"></textarea>

            <button type='submit'>Send!</button>
      </form>
    </body>
<style scoped="true">
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        width: 100vw;
        margin: 0;
    }
    form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      max-width: 40%;
    }
    </style>
</html>
