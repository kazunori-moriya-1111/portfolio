<div>
    <button wire:click="openModal()" type="button" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
        タグを編集する
    </button>

    @if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        タグ登録
                    </h3>
                    <div class="mt-2">
                        <form method="post" action="{{ route('tag.update', ['id' => $tag_id]) }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">タグ名</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="name" name="name" value="{{ $name }}" />
                                <button class="px-4 py-2 my-1 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">更新する</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700">
                        閉じる
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>