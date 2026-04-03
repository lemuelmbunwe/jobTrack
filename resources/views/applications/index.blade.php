<x-layout>
    
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <x-info-card>
            TOTAL APPLICATIONS
            <x-slot:stat>
                {{ $stats->total }}
            </x-slot:stat>
            <x-slot:emoji>
                📝
            </x-slot:emoji>
        </x-info-card>

        
        <x-info-card>
            INTERVIEWS
            <x-slot:stat>
                {{ $stats->interviews }}
            </x-slot:stat>
            <x-slot:emoji>
                📞
            </x-slot:emoji>
        </x-info-card>

        <x-info-card>
            OFFERS
            <x-slot:stat>
                {{ $stats->offers }}
            </x-slot:stat>
            <x-slot:emoji>
                ✨
            </x-slot:emoji>
        </x-info-card>

        <x-info-card>
            REJECTIONS
            <x-slot:stat>
                {{ $stats->rejections }}
            </x-slot:stat>
            <x-slot:emoji>
                ❌
            </x-slot:emoji>
        </x-info-card>
     </div>

     {{-- progress tracker section --}}
     <!-- Progress Section -->
    <div class="bg-white rounded-lg border border-slate-200 p-6 mb-12">
      <h2 class="text-lg font-semibold text-slate-900 mb-6">Application Pipeline</h2>
      <div class="space-y-6">
        <!-- Applied Progress -->
        <div>
          <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-slate-600">Applied</span>
            <span class="text-sm font-medium text-slate-900">{{$stats->applied}} / {{$total}}  ({{ $percentages['applied'] }}%)</span>
          </div>
          <div class="w-full bg-slate-200 rounded-full h-2">
            <div class="bg-blue-500 h-2 rounded-full" style="width: {{$percentages['applied']}}%"></div>
          </div>
        </div>

        <!-- Interview Progress -->
        <div>
          <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-slate-600">Interview</span>
            <span class="text-sm font-medium text-slate-900">{{$stats->interviews}} / {{$total}} ({{$percentages['interviews']}}%)</span>
          </div>
          <div class="w-full bg-slate-200 rounded-full h-2">
            <div class="bg-amber-500 h-2 rounded-full" style="width: {{$percentages['interviews']}}%"></div>
          </div>
        </div>

        <!-- Offer Progress -->
        <div>
          <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-slate-600">Offer</span>
            <span class="text-sm font-medium text-slate-900">{{$stats->offers}} / {{$total}} ({{$percentages['offers']}}%)</span>
          </div>
          <div class="w-full bg-slate-200 rounded-full h-2">
            <div class="bg-green-500 h-2 rounded-full" style="width: {{$percentages['offers']}}%"></div>
          </div>
        </div>

        <!-- Rejected Progress -->
        <div>
          <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-slate-600">Rejected</span>
            <span class="text-sm font-medium text-slate-900"> {{$stats->rejections}} / {{$total}} ({{$percentages['rejections']}}%)</span>
          </div>
          <div class="w-full bg-slate-200 rounded-full h-2">
            <div class="bg-red-500 h-2 rounded-full" style="width: {{$percentages['rejections']}}%"></div>
          </div>
        </div>
      </div>
    </div>

    {{-- recent application display --}}

    
    <x-list-container>
      <x-slot:header>
      <div class="px-6 py-4 border-b border-slate-200">
        <h2 class="text-lg font-semibold text-slate-900">Recent Applications</h2>
      </div>
      </x-slot:header>
        

      @foreach($applications as $app)
      
      <tr class="hover:bg-slate-50 transition">
              <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ $app->company }}</td>
              <td class="px-6 py-4 text-sm text-slate-600">{{ $app->role }}</td>
              <td class="px-6 py-4 text-sm">
                @switch($app->status)
                  @case('applied')
                    <x-status class="bg-blue-100 text-blue-800">{{$app->status}}</x-status>
                    @break
                  
                    @case('interview')
                    <x-status class="bg-amber-100 text-amber-800">{{$app->status}}</x-status>
                    @break

                    @case('rejected')
                    <x-status class=" bg-red-100 text-red-800">{{$app->status}}</x-status>
                    @break

                    @case('offer')
                    <x-status class="bg-green-100 text-green-800">{{$app->status}}</x-status>
                    @break

                    @default
                     <x-status class="bg-blue-100 text-blue-800">{{$app->status}}</x-status>
                  
                  @endswitch

              </td>

              {{-- code segment to display date either in M d, Y or show something 3 days ago --}}
              @php
                $isRecent = $app->applied_at->gt(now()->subDays(2));
              @endphp

              @if($isRecent)
              <td class="px-6 py-4 text-sm text-slate-600">{{ $app->applied_at->diffForHumans() }}</td>
              @else
              <td class="px-6 py-4 text-sm text-slate-600">{{ $app->applied_at->format('M d, Y') }}</td>
              @endif


              <td class="px-6 py-4 text-sm">
                <div class="flex gap-3">
                  <a class="text-blue-600 hover:text-blue-700 transition" title="Edit application" href=" {{route('applications.edit' , $app)}}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                  </a>
                  <button class="text-red-600 hover:text-red-700 transition" title="Delete application">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3H4v2h16V7h-3z"></path></svg>
                  </button>
                </div>
              </td>
            </tr>

      @endforeach

    </x-list-container>

    
    



</x-layout>