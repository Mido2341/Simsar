<div>
    @if($isEditing)
        @include('commentify::livewire.partials.comment-form',[
            'method'=>'editComment',
            'state'=>'editState',
            'inputId'=> 'reply-comment',
            'inputLabel'=> 'Your Reply',
            'button'=>'Edit Comment'
        ])
    @else
        <article class="p-6 mb-1 text-base bg-white rounded-lg dark:bg-gray-900">
            <footer class="flex justify-between items-center mb-1">


                  {{-- test div --}}
                  <div class="card">
                <div class="card-header">
                    <h2 class="font-bold">{{auth()->user()->first_name}}  {{auth()->user()->last_name}}</h2>
                    <p class="">
                        <time pubdate datetime="{{$comment->presenter()->relativeCreatedAt()}}"
                              title="{{$comment->presenter()->relativeCreatedAt()}}">
                            {{$comment->presenter()->relativeCreatedAt()}}
                        </time>
                    </p>
                </div>

                <div class="relative">
                    <button wire:click="$toggle('showOptions')"
                            class="btn btn-primary"

                            type="button">
                            <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <!-- Dropdown menu -->
                    @if($showOptions)
                        <div
                            class="absolute z-10 top-full right-0 mt-1 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                @can('update',$comment)
                                    <li>
                                        <button wire:click="$toggle('isEditing')" type="button"
                                                class="btn btn-primary my-3">Edit
                                        </button>
                                    </li>
                                @endcan
                                @can('destroy',$comment)
                                    <li>

                                        <button
                                            x-on:click="confirmCommentDeletion"
                                            x-data="{
                                    confirmCommentDeletion(){
                                        if(window.confirm('You sure to delete this comment?')){
                                            @this.call('deleteComment')
                                        }
                                    }
                                }"
                                            class="btn btn-primary">
                                            Delete
                                        </button>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    @endif
                </div>
            </footer>
            <h3 class="text-dark">
               {!! $comment->presenter()->replaceUserMentions($comment->presenter()->markdownBody()) !!}
            </h3>

            <div class="flex items-center mt-4 space-x-4">
                <livewire:like :$comment :key="$comment->id"/>
                @auth
                    @if($comment->isParent())
                        <button type="button" wire:click="$toggle('isReplying')"
                                class="btn btn-primary">
                                <i class="fas fa-comment-dots"></i>
                            Reply
                        </button>

                        <div wire:loading wire:target="$toggle('isReplying')">
                            @include('commentify::livewire.partials.loader')
                        </div>
                    @endif
                @endauth
                @if($comment->children->count())
                    <button type="button" wire:click="$toggle('hasReplies')"
                            class="btn btn-warning">
                        @if(!$hasReplies)
                            View all Replies ({{$comment->children->count()}})
                        @else
                            Hide Replies
                        @endif
                    </button>
                    <div wire:loading wire:target="$toggle('hasReplies')">
                        @include('commentify::livewire.partials.loader')
                    </div>
                @endif

            </div>

        </article>
    @endif
    @if($isReplying)
        @include('commentify::livewire.partials.comment-form',[
           'method'=>'postReply',
           'state'=>'replyState',
           'inputId'=> 'reply-comment',
           'inputLabel'=> 'Your Reply',
           'button'=>'Post Reply'
       ])
    @endif
    @if($hasReplies)

        <article class="p-1 mb-1 ml-1 lg:ml-12 border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            @foreach($comment->children as $child)
                <livewire:comment :comment="$child" :key="$child->id"/>
            @endforeach
        </article>
    @endif
    <script>
        function detectAtSymbol() {
            const textarea = document.getElementById('reply-comment');

            // Check if the textarea element exists
            if (!textarea) {
                console.warn("Couldn't find the 'reply-comment' element.");
                return;
            }

            const cursorPosition = textarea.selectionStart;
            const textBeforeCursor = textarea.value.substring(0, cursorPosition);
            const atSymbolPosition = textBeforeCursor.lastIndexOf('@');

            if (atSymbolPosition !== -1) {
                const searchTerm = textBeforeCursor.substring(atSymbolPosition + 1);

                if (searchTerm.trim().length > 0) {
                    window.livewire.dispatch('getUsers', searchTerm);
                }
            }
        }
    </script>

</div>
{{-- test div --}}
</div>


