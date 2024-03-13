<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl
  text-center text-orange-700
   font-bold underline">
   Welcome to Student details Route
  </h1>
  <div>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      
      <div class="mt-4 sm:mt-0 
      justify-end
      sm:ml-16 sm:flex-none">
        <a 
        href="/data"
        type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Show name and course</a>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300 ">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    class
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    roll
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Fathers Name
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Mothers Name
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                   Courses
                  </th>
                 
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach($students as $student)
                <tr v-for="(person, personIdx) in people" :key="person.email" :class="personIdx % 2 === 0 ? undefined : 'bg-gray-50 hover:bg-gray-500'">
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                  {{ $student->name }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  {{ $student->class }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  {{ $student->roll }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    {{$student->detail->Father_name}}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    {{$student->detail->Mother_name}}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <table>
                @foreach($student->courses as $course)
                <tr>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->course_id }}</td>
                </tr>
                @endforeach
                </table>
                </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>