<x-layouts.guest>
    <section class="hero is-success is-fullheight body-bg">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Duinenmars Backoffice</h3>
                    <hr class="login-hr">
                    <div class="box">
                        <figure class="avatar">
                            <img src="/favicon.ico">
                        </figure>

                        @if ($errors->any())
                            <div class="message is-danger">
                                <div class="message-body">
                                    {{ $errors->first() }}
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="field">
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="Your Email" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </div>
                            <button class="button is-block is-info is-fullwidth">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
