@extends('layouts.main')

@push('styles')
<style>
    .contact-container {
        background: linear-gradient(135deg, rgba(73,17,28,0.3) 0%, rgba(10,9,8,0.5) 100%);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        padding: 0;
    }
    .contact-form-section {
        background: rgba(44,44,44,0.8);
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 100%;
    }
    .contact-heading {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--light);
        margin-bottom: 8px;
    }
    .contact-subheading {
        color: var(--taupe);
        font-size: 0.85rem;
        margin-bottom: 30px;
    }
    .form-label {
        color: var(--light);
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 6px;
    }
    .contact-form .form-control {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(169,146,125,0.3);
        border-radius: 8px;
        padding: 10px 14px;
        color: var(--light);
        font-size: 0.85rem;
    }
    .contact-form .form-control:focus {
        background: rgba(255,255,255,0.15);
        border-color: var(--taupe);
        box-shadow: 0 0 0 3px rgba(169,146,125,0.1);
    }
    .contact-form .form-control::placeholder {
        color: rgba(255,255,255,0.5);
    }
    .contact-form textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }
    .btn-send {
        background: var(--burgundy);
        border: none;
        padding: 12px 35px;
        border-radius: 8px;
        color: white;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-send:hover {
        background: var(--brown);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(73,17,28,0.4);
    }
    .contact-logo-section {
        background: linear-gradient(135deg, var(--burgundy) 0%, var(--black) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        min-height: 500px;
    }
    .contact-logo-section img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    @media (max-width: 992px) {
        .contact-logo-section {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-xl-10">
        <div class="contact-container">
            <div class="row g-0">
                <div class="col-lg-7">
                    <div class="contact-form-section">
                        <h2 class="contact-heading">Send Us A Message</h2>
                        <p class="contact-subheading">Give us chance to serve and bring magic to your brand.</p>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control" name="name" placeholder="Galakta Gomez" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Your Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Teches@example.com" required>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Your Phone</label>
                                <input class="form-control" name="subject" placeholder="+6250-3860-6565">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" name="message" placeholder="How can we help you?" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-send">
                                SEND MESSAGE
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-logo-section">
                        <img src="/images/logo.jpg" alt="DreamRoast Coffee" style="max-width: 280px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
