<div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
{{$header}}
        <table class="w-full">
          <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Company</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Role</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Applied</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-slate-200">
            {{$slot}}
            

          </tbody>
        </table>





</div>