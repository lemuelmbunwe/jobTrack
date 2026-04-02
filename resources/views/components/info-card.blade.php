<div class="bg-white rounded-lg border border-slate-200 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-slate-600"> {{$slot}} </p>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{$stat}}</p>
          </div>
          <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
            <span class="text-xl">{{$emoji}}</span>
          </div>
        </div>
      </div>