<div class="py-5 text-center">
    <h2>Register form</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required
        form group has a validation state that can be triggered by attempting to submit the form without
        completing it.</p>
</div>
<?php foreach($errors->all() as $error) {

    echo $error;

}
?>
<div class="row g-5">
    <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">User Information</h4>
        <form class="needs-validation" action="{{ url('/register') }}" method="post" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value=""
                        required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value=""
                        required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="********"
                        required>
                    <div class="invalid-feedback">
                        Please enter your Password.
                    </div>
                </div>
            <hr class="my-4">
            <div class="col-3 text-center">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
<div class="row g-5">
    <div class="col-md-12 col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>name</td>
                    <td>email</td>
                    <td>เครื่องมือ</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        <a href="{{ url('/edit/'. $value->id) }}"
                            class="btn btn-warning">แก้ไข</a>
                        <a href="{{ url('/delete_user/'. $value->id) }}"
                            class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
