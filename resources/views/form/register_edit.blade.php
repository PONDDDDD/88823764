<div class="py-5 text-center">
    <h2>EDIT Register form</h2>
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
        <form class="needs-validation" action="{{ url('/update') }}" method="post" novalidate>
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="{{explode(' ',$user->name)[0]}}"
                        required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="{{explode(' ',$user->name)[1]}}"
                        required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{$user->email}}">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="********" value="{{$user->password}}"
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
