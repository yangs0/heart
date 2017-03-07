<div class="topics-list-content">
    <ul class="topics-list list-unstyled">
        @foreach($topics as $topic)
            <li class="clearfix-s" style="position: relative">
                <a class="topics-img " target="_blank" href="/uploads/images/5879cfe6c4f24.jpg" title="日本东北旅游局宣传片《秋天颜色》">
                    <img src="/uploads/images/5879cfe6c4f24.jpg" class="img-responsive img-thumbnail" alt="日本东北旅游局宣传片《秋天颜色》" _hover-ignore="1">
                </a>
                <div class="topic-main">
                    <h1>
                        <a target="_blank" href="/50947?from=index_new_title" title="日本东北旅游局宣传片《秋天颜色》">日本东北旅游局宣传片《秋天颜色》</a>
                    </h1>
                    <div class="topic-intro">
                        <a target="_blank" href="/50947?from=index_new_intro" _hover-ignore="1">静静感受本州奥羽之地的秋意</a>
                    </div>
                    <div class="topic-more clearfix">
                                    <span class="time">
                                        <span>旅行</span>
                                    </span>
                        <span class="time">10 小时前</span>
                        <div class="about">
                            <span><i class="fa fa-commenting-o"></i> 8</span>
                            <span><i class="fa fa-heart-o"></i> 8</span>
                            <span><i class="fa fa-share-alt"></i> 8</span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
    </ul>

    <section class="design-pages">{{$topics->links()}}</section>
</div>