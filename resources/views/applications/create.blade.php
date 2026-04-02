<x-layout>
    <div class="mb-8">
      <a href="/applications" class="text-blue-600 hover:text-blue-700 text-sm font-medium mb-4 inline-block">← Back to Applications</a>
      <h2 class="text-3xl font-bold text-slate-900">Create New Application</h2>
      <p class="text-slate-600 mt-2">Fill in the details of your job application</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg border border-slate-200 p-8">
      <form class="space-y-6" action="/applications" method="POST">
        @csrf
        <!-- Company Name Field -->
        <div>
          <label for="company" class="block text-sm font-semibold text-slate-900 mb-2">Company Name *</label>
          <input 
            name="company"
            :value="old(company)"
            type="text" 
            id="company"
            placeholder="e.g., Acme Corp"
            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900"
            required
          >
          {{-- <p class="text-xs text-slate-600 mt-1">Enter the name of the company</p> --}}
        </div>

        <!-- Role Field -->
        <div>
          <label for="role" class="block text-sm font-semibold text-slate-900 mb-2">Job Role *</label>
          <input 
            name="role"
            :value="old(role)"
            type="text" 
            id="role"
            placeholder="e.g., Senior Product Designer"
            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900"
            required
          >
          {{-- <p class="text-xs text-slate-600 mt-1">Enter the job title or role</p> --}}
        </div>

        <!-- Status Field -->
        <div>
          <label for="status" class="block text-sm font-semibold text-slate-900 mb-2">Status *</label>
          <select 
            name="status"
            :value="old(status)"
            id="status"
            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900 bg-white"
            required
          >
            <option value="">Select a status</option>
            <option value="applied">Applied</option>
            <option value="interview">Interview</option>
            <option value="offer">Offer</option>
            <option value="rejected">Rejected</option>
          </select>
          {{-- <p class="text-xs text-slate-600 mt-1">Select the current status of your application</p> --}}
        </div>

        <!-- Date Applied Field -->
        <div>
          <label for="date" class="block text-sm font-semibold text-slate-900 mb-2">Date Applied *</label>
          <input 
          :value="old(date)"
            name="date"
            type="date" 
            id="date"
            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900"
            required
          >
          {{-- <p class="text-xs text-slate-600 mt-1">When did you apply?</p> --}}
        </div>

        <!-- Notes Field -->
        <div>
          <label for="notes" class="block text-sm font-semibold text-slate-900 mb-2">Notes</label>
          <textarea 
            :value="old(notes)"
            name="notes"
            id="notes"
            placeholder="Add any additional notes... (e.g., contact person, interview date, salary expectations)"
            rows="5"
            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900 resize-none"
          ></textarea>
          {{-- <p class="text-xs text-slate-600 mt-1">Add any relevant notes about this application</p> --}}
        </div>

        <!-- Form Actions -->
        <div class="flex gap-4 pt-6 border-t border-slate-200">
          <a 
            href="/applications"
            class="flex-1 px-6 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 font-semibold text-center transition"
          >
            Cancel
          </a>
          <button 
            type="submit"
            class="flex-1 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold transition"
          >
            Create Application
          </button>
        </div>
      </form>
    </div>

    <!-- Help Section -->
    <div class="mt-8 bg-blue-50 rounded-lg border border-blue-200 p-6">
      <h3 class="font-semibold text-slate-900 mb-3">Tips for tracking applications</h3>
      <ul class="space-y-2 text-sm text-slate-700">
        <li class="flex gap-3">
          <span class="text-blue-600 font-bold">✓</span>
          Keep detailed notes about each position to help you remember conversations
        </li>
        <li class="flex gap-3">
          <span class="text-blue-600 font-bold">✓</span>
          Track interview dates and follow-up emails in the notes field
        </li>
        <li class="flex gap-3">
          <span class="text-blue-600 font-bold">✓</span>
          Update the status promptly to keep your pipeline accurate
        </li>
      </ul>
    </div>
</x-layout>