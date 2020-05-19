
    <div class="row justify-content-center">
        <div class="col-m-8">

            <div class="card">
            
                <div class="card-header">
                    Registered account
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <td>
                                Username
                            </td>
                            <td>
                                Email
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                            <tr>
                            <td>
                            {{ $user['username']}}
                            </td>
                            <td>
                            {{ $user['email']}}
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
