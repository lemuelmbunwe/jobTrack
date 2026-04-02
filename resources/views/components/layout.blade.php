<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Application Tracker - Dashboard</title>
  @vite(['/resources/css/app.css'])
</head>
<body class="bg-slate-50">
  <!-- Header -->
  <header class="border-b border-slate-200 bg-white">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-slate-900">Job Tracker</h1>
        <nav class="flex gap-8">
          <a href="index.html" class="text-slate-600 hover:text-slate-900 font-medium">Dashboard</a>
          <a href="applications.html" class="text-slate-600 hover:text-slate-900 font-medium">Applications</a>
        </nav>
      </div>
    </div>
  </header>
  <main class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    {{$slot}}
  </main>

  </body>
  </html>
