@extends('home')

@section('content')
<div class="container py-5" style="min-height: 60vh; display: flex; align-items: center; justify-content: center; background: #f0f2f5;">
    <div class="card shadow-lg border-0 p-5 animate__animated animate__fadeInDown" style="max-width: 480px; border-radius: 22px; background: #fff;">
        <div class="text-center">
            <div class="mb-4">
                <i class="fas fa-check-circle fa-3x text-success"></i>
            </div>
            <h2 class="mb-3" style="font-weight: 700; color: #1877f2; letter-spacing: 1px;">Signalement envoyé !</h2>
            <p class="mb-4 fs-5 text-gray-700">Voici le code de suivi de votre signalement :</p>
            <div class="mb-4">
                <span class="d-inline-block px-5 py-3 bg-light border border-primary rounded-pill fs-3 fw-bold text-primary shadow-sm" style="letter-spacing: 2px; font-family: 'Segoe UI', Arial, sans-serif;">
                    {{ $code_suivi }}
                </span>
            </div>
            <p class="mb-2 text-gray-600">Conservez ce code précieusement pour suivre l'état de votre dossier.</p>
            <a href="{{ route('suivi.show', ['code' => $code_suivi]) }}" class="btn btn-primary rounded-pill px-4 mt-3 shadow">
                <i class="fas fa-search me-2"></i>Suivre mon signalement
            </a>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
@endsection