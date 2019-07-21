@component('mail:message')
# Greeting from Project List

Welcome to ProjectList, you are almost there.<br>
Before you get started, please verify your email. <br>
Click on the verify button below:
@component('mail:button', ['url' => route('auth.activate', [
                            'token' => $user->evc_token,
                            'email' => $user->email
                          ])
          ])
verify
@endcomponent

@endcomponent