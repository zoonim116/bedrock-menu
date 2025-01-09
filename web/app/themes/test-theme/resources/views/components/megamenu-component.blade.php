<nav class="nav-primary border-solid border-t border-t-slate-600 relative"
     aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
  <div class="container pt-2">
    <div id="product-menu" class="inline-flex items-center gap-2 pb-2">
      <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M2.34375 0.65625C2.57812 0.65625 2.8125 0.890625 2.8125 1.125V3C2.8125 3.26367 2.57812 3.46875 2.34375 3.46875H0.46875C0.205078 3.46875 0 3.26367 0 3V1.125C0 0.890625 0.205078 0.65625 0.46875 0.65625H2.34375ZM2.34375 5.34375C2.57812 5.34375 2.8125 5.57812 2.8125 5.8125V7.6875C2.8125 7.95117 2.57812 8.15625 2.34375 8.15625H0.46875C0.205078 8.15625 0 7.95117 0 7.6875V5.8125C0 5.57812 0.205078 5.34375 0.46875 5.34375H2.34375ZM2.34375 10.0312C2.57812 10.0312 2.8125 10.2656 2.8125 10.5V12.375C2.8125 12.6387 2.57812 12.8438 2.34375 12.8438H0.46875C0.205078 12.8438 0 12.6387 0 12.375V10.5C0 10.2656 0.205078 10.0312 0.46875 10.0312H2.34375ZM14.5312 6.04688C14.7656 6.04688 15 6.28125 15 6.51562V6.98438C15 7.24805 14.7656 7.45312 14.5312 7.45312H5.15625C4.89258 7.45312 4.6875 7.24805 4.6875 6.98438V6.51562C4.6875 6.28125 4.89258 6.04688 5.15625 6.04688H14.5312ZM14.5312 10.7344C14.7656 10.7344 15 10.9688 15 11.2031V11.6719C15 11.9355 14.7656 12.1406 14.5312 12.1406H5.15625C4.89258 12.1406 4.6875 11.9355 4.6875 11.6719V11.2031C4.6875 10.9688 4.89258 10.7344 5.15625 10.7344H14.5312ZM14.5312 1.35938C14.7656 1.35938 15 1.59375 15 1.82812V2.29688C15 2.56055 14.7656 2.76562 14.5312 2.76562H5.15625C4.89258 2.76562 4.6875 2.56055 4.6875 2.29688V1.82812C4.6875 1.59375 4.89258 1.35938 5.15625 1.35938H14.5312Z"
          fill="white"/>
      </svg>
      {{__('Products') }}
      <div
        class="megamenu bg-white text-indigo-950 max-h-0 top-full transition-all overflow-hidden absolute left-0 w-full">
        <div class="container py-5 flex">
          <div class="parents w-[31%]">
            @if (count($rootElements) > 0)
              <ul>
                @foreach($rootElements as $elem)
                  <li>
                    <a href="{{$elem->url}}" id="slug_id_{{$elem->id}}" @class([
                                  'menu-item',
                                  'has-child' => $elem->hasChildren,
                                  'active' => $elem->id === get_queried_object_id() ||  in_array(get_queried_object_id(), $elem->childrens)
                              ])>
                      {{ $elem->title }}
                    </a>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="w-[69%] min-h-[292px]">
            @if(count($childElements) > 0)
              @foreach($childElements as $key => $subMenu)
                <ul data-parent-id="slug_id_{{$key}}" @class([
                            'lg:w-1/2 w-full relative pr-6 h-full',
                            'hidden' => !$loop->first
                        ])>
                  @foreach($subMenu as $subMenuItem)
                    <li>
                      <a href="{{$subMenuItem->url}}" @class([
                                'group menu-item',
                                'active' => $subMenuItem->id === get_queried_object_id()
                             ])>
                        {{$subMenuItem->title}}
                        <div class="category-preview">
                          @if($subMenuItem->image)
                            <img src="{{$subMenuItem->image->sizes['medium_large'] }}" alt=""
                                 class="hidden group-hover:flex"/>
                          @endif
                        </div>
                      </a>
                    </li>
                  @endforeach
                </ul>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
