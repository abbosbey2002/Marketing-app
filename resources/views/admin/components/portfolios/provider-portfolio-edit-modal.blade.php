<!--! ================================================================ !-->
<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
@foreach ($portfolios as $portfolio)
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="portfolioProviderEditOffcanvas{{ $portfolio->id }}">
<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
@foreach ($portfolios as $portfolio)
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="portfolioProviderEditOffcanvas{{ $portfolio->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i
                        class="feather-arrow-left"></i></div>
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i
                        class="feather-arrow-left"></i></div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Portfolio Edit</h2>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST"
                enctype="multipart/form-data">
            <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-7">
                        <div class="row">
                            <h4> Add work</h4>
                <div class="row">

                    <div class="col-md-7">
                        <div class="row">
                            <h4> Add work</h4>

                            <div class="col-md-12 mt-3">
                                <h5> Work's title</h5>
                                <div class="mb-4">
                                    <label class="form-label">Give a concise but meaningful title to your work. <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter a title for your work here..." name="name"
                                        value="{{ $portfolio->name }}">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h5> Work's title</h5>
                                <div class="mb-4">
                                    <label class="form-label">Give a concise but meaningful title to your work. <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter a title for your work here..." name="name"
                                        value="{{ $portfolio->name }}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="showcase form-group card">
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Uploaded Image">
                                        <!-- Check if the URL is correct by visiting it directly -->
                                        <p>Image URL: {{ asset('storage/' . $portfolio->image) }}</p>
                                        <h5>Image or Video</h5>
                                        <p>Display some images or videos showcasing your work.</p>
                                        <div id="workIllustrationsContainer">
                                            <main class="container">
                                                <div class="no-content">No image or video added yet.</div>
                                                <div class="buttons row">
                                                    <div class="col">
                                                        <a href="javascript:void(0);" id="imageFileBtn"
                                                            onclick="showInput('image')" class="btn btn-primary w-100">
                                                            <i class="feather-upload me-2"></i>
                                                            <span>Upload Image</span>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="javascript:void(0);" id="youtubeUrlBtn"
                                                            onclick="showInput('youtube')"
                                                            class="btn btn-outline-primary w-100">
                                                            <i class="fa-solid fa-link me-2"></i>
                                                            <span>YouTube Video</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="inputContainer">
                                                    <div id="imageInput" class="input-field" style="display: none;">
                                                        <label for="imageFile">Upload Image:</label>
                                                        <input type="file" id="imageFile" name="image"
                                                            accept="image/*">
                                                    </div>
                                                    <div id="youtubeInput" class="input-field" style="display: none;">
                                                        <label for="youtubeUrl">Add your YouTube Video URL:</label>
                                                        <input type="text" id="youtubeUrl" name="youtube_url"
                                                            placeholder="Enter YouTube video URL">
                                                    </div>
                                                </div>
                                            </main>
                                            <div class="text-dark mt-3" id="imageInputInfo" style="display: none;">
                                                Recommended size: <b>2MB max</b>. Recommended resolution: <b>1200x900
                                                    px</b>. Please try to keep a landscape ratio of: <b>1.3:1</b>.
                                            </div>
                                        </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="showcase form-group card">
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Uploaded Image">
                                        <!-- Check if the URL is correct by visiting it directly -->
                                        <p>Image URL: {{ asset('storage/' . $portfolio->image) }}</p>
                                        <h5>Image or Video</h5>
                                        <p>Display some images or videos showcasing your work.</p>
                                        <div id="workIllustrationsContainer">
                                            <main class="container">
                                                <div class="no-content">No image or video added yet.</div>
                                                <div class="buttons row">
                                                    <div class="col">
                                                        <a href="javascript:void(0);" id="imageFileBtn"
                                                            onclick="showInput('image')" class="btn btn-primary w-100">
                                                            <i class="feather-upload me-2"></i>
                                                            <span>Upload Image</span>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="javascript:void(0);" id="youtubeUrlBtn"
                                                            onclick="showInput('youtube')"
                                                            class="btn btn-outline-primary w-100">
                                                            <i class="fa-solid fa-link me-2"></i>
                                                            <span>YouTube Video</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="inputContainer">
                                                    <div id="imageInput" class="input-field" style="display: none;">
                                                        <label for="imageFile">Upload Image:</label>
                                                        <input type="file" id="imageFile" name="image"
                                                            accept="image/*">
                                                    </div>
                                                    <div id="youtubeInput" class="input-field" style="display: none;">
                                                        <label for="youtubeUrl">Add your YouTube Video URL:</label>
                                                        <input type="text" id="youtubeUrl" name="youtube_url"
                                                            placeholder="Enter YouTube video URL">
                                                    </div>
                                                </div>
                                            </main>
                                            <div class="text-dark mt-3" id="imageInputInfo" style="display: none;">
                                                Recommended size: <b>2MB max</b>. Recommended resolution: <b>1200x900
                                                    px</b>. Please try to keep a landscape ratio of: <b>1.3:1</b>.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <h5> Expertise</h5>
                                <div class="form-group mb-4">
                                    <label class="form-label">Indicate the fields of expertise requested for the work
                                        you delivered.</label>
                                    <select class="form-control" data-select2-selector="status" name="expertise">

                                        @foreach ($services as $service)
                                            <option value="primary" data-bg="bg-primary"
                                                {{ $portfolio->expertise == 'primary' ? 'selected' : '' }}>Inprogress
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h5> Skills <span> (optional) </span></h5>
                                <div class="mb-4">
                                    <label class="form-label">Indicate what were the skills or competences needed from
                                        your team to deliver the work requested.<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="selcet..." name="skills"
                                        value="{{ $portfolio->skills }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5> Expertise</h5>
                                <div class="form-group mb-4">
                                    <label class="form-label">Indicate the fields of expertise requested for the work
                                        you delivered.</label>
                                    <select class="form-control" data-select2-selector="status" name="expertise">

                                        @foreach ($services as $service)
                                            <option value="primary" data-bg="bg-primary"
                                                {{ $portfolio->expertise == 'primary' ? 'selected' : '' }}>Inprogress
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h5> Skills <span> (optional) </span></h5>
                                <div class="mb-4">
                                    <label class="form-label">Indicate what were the skills or competences needed from
                                        your team to deliver the work requested.<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="selcet..." name="skills"
                                        value="{{ $portfolio->skills }}">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h5> Start date </h5>
                                <div class="mb-4">
                                    <input type="date" class="form-control" name="start_date"
                                        placeholder="Enter a budjet..." value="{{ $portfolio->start_date }}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h5> End date</h5>
                                <div class="mb-4">
                                    <input type="date" class="form-control" name="end_date"
                                        placeholder="Enter a budjet..." value="{{ $portfolio->end_date }}">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h5> Budget <span> (optional) </span></h5>
                                <div class="mb-4">
                                    <label class="form-label">Indicate what was the total budget allocated to this work
                                        delivery.<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="budget"
                                        placeholder="Enter a budjet..." value="{{ $portfolio->budget }}">
                                    <label class="form-label">Confidential: This information won’t be visible publicly
                                        but will help us send you more accurate and relevant opportunities.<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <h5> Description <span> (optional) </span></h5>
                                    <label class="form-label">Describe the details of your collaboration with the
                                        client on the work delivered.</label>
                                </div>
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Introduction</h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="5" name="introduction"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->introduction }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Challenges </h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="5" name="challenges"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->challenges }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Solution </h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="5" name="solution"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->solution }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Impact</h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" name="impact" rows="5"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->impact }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h5> Reference link <span> (optional) </span></h5>
                                <div class="mb-4">
                                    <label class="form-label">Provide a link to the result of your collaboration (e.g.
                                        A link to the website, the video, the event).</label>
                                    <input type="text" class="form-control" name="link"
                                        placeholder="Enter a link for you work..." value="{{ $portfolio->link }}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h5> Budget <span> (optional) </span></h5>
                                <div class="mb-4">
                                    <label class="form-label">Indicate what was the total budget allocated to this work
                                        delivery.<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="budget"
                                        placeholder="Enter a budjet..." value="{{ $portfolio->budget }}">
                                    <label class="form-label">Confidential: This information won’t be visible publicly
                                        but will help us send you more accurate and relevant opportunities.<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <h5> Description <span> (optional) </span></h5>
                                    <label class="form-label">Describe the details of your collaboration with the
                                        client on the work delivered.</label>
                                </div>
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Introduction</h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="5" name="introduction"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->introduction }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Challenges </h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="5" name="challenges"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->challenges }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Solution </h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="5" name="solution"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->solution }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="form-group">
                                        <h6> Impact</h6>
                                        <label class="form-label">As an introduction, briefly describe the work
                                            delivered in a few sentences.</label>
                                        <textarea class="form-control" id="exampleTextarea" name="impact" rows="5"
                                            placeholder="Bu yerga matn kiriting...">{{ $portfolio->impact }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h5> Reference link <span> (optional) </span></h5>
                                <div class="mb-4">
                                    <label class="form-label">Provide a link to the result of your collaboration (e.g.
                                        A link to the website, the video, the event).</label>
                                    <input type="text" class="form-control" name="link"
                                        placeholder="Enter a link for you work..." value="{{ $portfolio->link }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5 sticky-column">
                        </div>
                    </div>
                    <div class="col-md-5 sticky-column">
                        <div class="row">
                            <h4>Client</h4>

                            <div class="col-md-12 mt-3">
                                <h6>Company name</h6>
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="company_name"
                                        placeholder="Enter a title for your work here..."
                                        value="{{ $portfolio->company_name }}">
                                    <input type="text" class="form-control" name="company_name"
                                        placeholder="Enter a title for your work here..."
                                        value="{{ $portfolio->company_name }}">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h6>Location</h6>
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="company_location"
                                        placeholder="Enter a title for your work here..."
                                        value="{{ $portfolio->company_location }}">
                                    <input type="text" class="form-control" name="company_location"
                                        placeholder="Enter a title for your work here..."
                                        value="{{ $portfolio->company_location }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>Sector</h6>
                                <div class="form-group mb-4">
                                    <select class="form-control" data-select2-selector="status" name="sector">
                                        <option value="Automotive"
                                            {{ $portfolio->sector == 'Automotive' ? 'selected' : '' }}>Automotive
                                        </option>
                                        <option value="Beverage"
                                            {{ $portfolio->sector == 'Beverage' ? 'selected' : '' }}>Beverage</option>
                                        <option value="Clothing & Accessories"
                                            {{ $portfolio->sector == 'Clothing & Accessories' ? 'selected' : '' }}>
                                            Clothing & Accessories</option>
                                        <option value="Consumer Electronics"
                                            {{ $portfolio->sector == 'Consumer Electronics' ? 'selected' : '' }}>
                                            Consumer Electronics</option>
                                        <option value="Energy & Oil"
                                            {{ $portfolio->sector == 'Energy & Oil' ? 'selected' : '' }}>Energy & Oil
                                        </option>
                                        <option value="Banking & Financials"
                                            {{ $portfolio->sector == 'Banking & Financials' ? 'selected' : '' }}>
                                            Banking & Financials</option>
                                        <option value="Government & Administration"
                                            {{ $portfolio->sector == 'Government & Administration' ? 'selected' : '' }}>
                                            Government & Administration</option>
                                        <option value="Food" {{ $portfolio->sector == 'Food' ? 'selected' : '' }}>
                                            Food</option>
                                        <option value="Hospitals & Healthcare"
                                            {{ $portfolio->sector == 'Hospitals & Healthcare' ? 'selected' : '' }}>
                                            Hospitals & Healthcare</option>
                                        <option value="Household Products"
                                            {{ $portfolio->sector == 'Household Products' ? 'selected' : '' }}>
                                            Household Products</option>
                                        <option value="Industrial Goods & Services"
                                            {{ $portfolio->sector == 'Industrial Goods & Services' ? 'selected' : '' }}>
                                            Industrial Goods & Services</option>
                                        <option value="Media" {{ $portfolio->sector == 'Media' ? 'selected' : '' }}>
                                            Media</option>
                                        <option value="Military"
                                            {{ $portfolio->sector == 'Military' ? 'selected' : '' }}>Military</option>
                                        <option value="Non-profit"
                                            {{ $portfolio->sector == 'Non-profit' ? 'selected' : '' }}>Non-profit
                                        </option>
                                        <option value="Pharmaceuticals & Biotech"
                                            {{ $portfolio->sector == 'Pharmaceuticals & Biotech' ? 'selected' : '' }}>
                                            Pharmaceuticals & Biotech</option>
                                        <option value="Retail" {{ $portfolio->sector == 'Retail' ? 'selected' : '' }}>
                                            Retail</option>
                                        <option value="Software & Computer Services"
                                            {{ $portfolio->sector == 'Software & Computer Services' ? 'selected' : '' }}>
                                            Software & Computer Services</option>
                                        <option value="Technology Hardware & Equipment"
                                            {{ $portfolio->sector == 'Technology Hardware & Equipment' ? 'selected' : '' }}>
                                            Technology Hardware & Equipment</option>
                                        <option value="Telecommunications"
                                            {{ $portfolio->sector == 'Telecommunications' ? 'selected' : '' }}>
                                            Telecommunications</option>
                                        <option value="Tobacco"
                                            {{ $portfolio->sector == 'Tobacco' ? 'selected' : '' }}>Tobacco</option>
                                        <option value="Toys" {{ $portfolio->sector == 'Toys' ? 'selected' : '' }}>
                                            Toys</option>
                                        <option value="Travel & Leisure"
                                            {{ $portfolio->sector == 'Travel & Leisure' ? 'selected' : '' }}>Travel &
                                            Leisure</option>
                                        <option value="Utilities"
                                            {{ $portfolio->sector == 'Utilities' ? 'selected' : '' }}>Utilities
                                        </option>
                                        <option value="Real Estate"
                                            {{ $portfolio->sector == 'Real Estate' ? 'selected' : '' }}>Real Estate
                                        </option>
                                        <option value="Others" {{ $portfolio->sector == 'Others' ? 'selected' : '' }}>
                                            Others</option>
                                        <option value="Accounting"
                                            {{ $portfolio->sector == 'Accounting' ? 'selected' : '' }}>Accounting
                                        </option>
                                        <option value="Architecture & Planning"
                                            {{ $portfolio->sector == 'Architecture & Planning' ? 'selected' : '' }}>
                                            Architecture & Planning</option>
                                        <option value="Art & Handcraft"
                                            {{ $portfolio->sector == 'Art & Handcraft' ? 'selected' : '' }}>Art &
                                            Handcraft</option>
                                        <option value="Aviation & Aerospace"
                                            {{ $portfolio->sector == 'Aviation & Aerospace' ? 'selected' : '' }}>
                                            Aviation & Aerospace</option>
                                        <option value="Construction"
                                            {{ $portfolio->sector == 'Construction' ? 'selected' : '' }}>Construction
                                        </option>
                                        <option value="E-commerce"
                                            {{ $portfolio->sector == 'E-commerce' ? 'selected' : '' }}>E-commerce
                                        </option>
                                        <option value="Education"
                                            {{ $portfolio->sector == 'Education' ? 'selected' : '' }}>Education
                                        </option>
                                        <option value="Entertainment & Events"
                                            {{ $portfolio->sector == 'Entertainment & Events' ? 'selected' : '' }}>
                                            Entertainment & Events</option>
                                        <option value="Farming"
                                            {{ $portfolio->sector == 'Farming' ? 'selected' : '' }}>Farming</option>
                                        <option value="Home Services"
                                            {{ $portfolio->sector == 'Home Services' ? 'selected' : '' }}>Home Services
                                        </option>
                                        <option value="Human Resources"
                                            {{ $portfolio->sector == 'Human Resources' ? 'selected' : '' }}>Human
                                            Resources</option>
                                        <option value="Insurance"
                                            {{ $portfolio->sector == 'Insurance' ? 'selected' : '' }}>Insurance
                                        </option>
                                        <option value="Internet"
                                            {{ $portfolio->sector == 'Internet' ? 'selected' : '' }}>Internet</option>
                                        <option value="Legal Services"
                                            {{ $portfolio->sector == 'Legal Services' ? 'selected' : '' }}>Legal
                                            Services</option>
                                        <option value="Logistics & Supply Chain"
                                            {{ $portfolio->sector == 'Logistics & Supply Chain' ? 'selected' : '' }}>
                                            Logistics & Supply Chain</option>
                                        <option value="Luxury Goods & Jewelry"
                                            {{ $portfolio->sector == 'Luxury Goods & Jewelry' ? 'selected' : '' }}>
                                            Luxury Goods & Jewelry</option>
                                        <option value="Manegement Consulting"
                                            {{ $portfolio->sector == 'Manegement Consulting' ? 'selected' : '' }}>
                                            Manegement Consulting</option>
                                        <option value="Marketing & Advertising"
                                            {{ $portfolio->sector == 'Marketing & Advertising' ? 'selected' : '' }}>
                                            Marketing & Advertising</option>
                                        <option value="Music" {{ $portfolio->sector == 'Music' ? 'selected' : '' }}>
                                            Music</option>
                                        <option value="Pets" {{ $portfolio->sector == 'Pets' ? 'selected' : '' }}>
                                            Pets</option>
                                        <option value="Political Organization"
                                            {{ $portfolio->sector == 'Political Organization' ? 'selected' : '' }}>
                                            Political Organization</option>
                                        <option value="warning"
                                            {{ $portfolio->sector == 'Restaurant' ? 'selected' : '' }}>Restaurant
                                        </option>
                                        <option value="Sports" {{ $portfolio->sector == 'Sports' ? 'selected' : '' }}>
                                            Sports</option>
                                        <option value="Storage"
                                            {{ $portfolio->sector == 'Storage' ? 'selected' : '' }}>Storage</option>
                                        <option value="Transportation"
                                            {{ $portfolio->sector == 'Transportation' ? 'selected' : '' }}>
                                            Transportation</option>
                                        <option value="Wine & Spirits"
                                            {{ $portfolio->sector == 'Wine & Spirits' ? 'selected' : '' }}>Wine &
                                            Spirits</option>
                                        <option value="Publishing"
                                            {{ $portfolio->sector == 'Publishing' ? 'selected' : '' }}>Publishing
                                        </option>
                                        <option value="Video Games"
                                            {{ $portfolio->sector == 'Video Games' ? 'selected' : '' }}>Video Games
                                        </option>
                                        <option value="Beauty" {{ $portfolio->sector == 'Beauty' ? 'selected' : '' }}>
                                            Beauty</option>
                                        <option value="Automotive"
                                            {{ $portfolio->sector == 'Automotive' ? 'selected' : '' }}>Automotive
                                        </option>
                                        <option value="Beverage"
                                            {{ $portfolio->sector == 'Beverage' ? 'selected' : '' }}>Beverage</option>
                                        <option value="Clothing & Accessories"
                                            {{ $portfolio->sector == 'Clothing & Accessories' ? 'selected' : '' }}>
                                            Clothing & Accessories</option>
                                        <option value="Consumer Electronics"
                                            {{ $portfolio->sector == 'Consumer Electronics' ? 'selected' : '' }}>
                                            Consumer Electronics</option>
                                        <option value="Energy & Oil"
                                            {{ $portfolio->sector == 'Energy & Oil' ? 'selected' : '' }}>Energy & Oil
                                        </option>
                                        <option value="Banking & Financials"
                                            {{ $portfolio->sector == 'Banking & Financials' ? 'selected' : '' }}>
                                            Banking & Financials</option>
                                        <option value="Government & Administration"
                                            {{ $portfolio->sector == 'Government & Administration' ? 'selected' : '' }}>
                                            Government & Administration</option>
                                        <option value="Food" {{ $portfolio->sector == 'Food' ? 'selected' : '' }}>
                                            Food</option>
                                        <option value="Hospitals & Healthcare"
                                            {{ $portfolio->sector == 'Hospitals & Healthcare' ? 'selected' : '' }}>
                                            Hospitals & Healthcare</option>
                                        <option value="Household Products"
                                            {{ $portfolio->sector == 'Household Products' ? 'selected' : '' }}>
                                            Household Products</option>
                                        <option value="Industrial Goods & Services"
                                            {{ $portfolio->sector == 'Industrial Goods & Services' ? 'selected' : '' }}>
                                            Industrial Goods & Services</option>
                                        <option value="Media" {{ $portfolio->sector == 'Media' ? 'selected' : '' }}>
                                            Media</option>
                                        <option value="Military"
                                            {{ $portfolio->sector == 'Military' ? 'selected' : '' }}>Military</option>
                                        <option value="Non-profit"
                                            {{ $portfolio->sector == 'Non-profit' ? 'selected' : '' }}>Non-profit
                                        </option>
                                        <option value="Pharmaceuticals & Biotech"
                                            {{ $portfolio->sector == 'Pharmaceuticals & Biotech' ? 'selected' : '' }}>
                                            Pharmaceuticals & Biotech</option>
                                        <option value="Retail" {{ $portfolio->sector == 'Retail' ? 'selected' : '' }}>
                                            Retail</option>
                                        <option value="Software & Computer Services"
                                            {{ $portfolio->sector == 'Software & Computer Services' ? 'selected' : '' }}>
                                            Software & Computer Services</option>
                                        <option value="Technology Hardware & Equipment"
                                            {{ $portfolio->sector == 'Technology Hardware & Equipment' ? 'selected' : '' }}>
                                            Technology Hardware & Equipment</option>
                                        <option value="Telecommunications"
                                            {{ $portfolio->sector == 'Telecommunications' ? 'selected' : '' }}>
                                            Telecommunications</option>
                                        <option value="Tobacco"
                                            {{ $portfolio->sector == 'Tobacco' ? 'selected' : '' }}>Tobacco</option>
                                        <option value="Toys" {{ $portfolio->sector == 'Toys' ? 'selected' : '' }}>
                                            Toys</option>
                                        <option value="Travel & Leisure"
                                            {{ $portfolio->sector == 'Travel & Leisure' ? 'selected' : '' }}>Travel &
                                            Leisure</option>
                                        <option value="Utilities"
                                            {{ $portfolio->sector == 'Utilities' ? 'selected' : '' }}>Utilities
                                        </option>
                                        <option value="Real Estate"
                                            {{ $portfolio->sector == 'Real Estate' ? 'selected' : '' }}>Real Estate
                                        </option>
                                        <option value="Others" {{ $portfolio->sector == 'Others' ? 'selected' : '' }}>
                                            Others</option>
                                        <option value="Accounting"
                                            {{ $portfolio->sector == 'Accounting' ? 'selected' : '' }}>Accounting
                                        </option>
                                        <option value="Architecture & Planning"
                                            {{ $portfolio->sector == 'Architecture & Planning' ? 'selected' : '' }}>
                                            Architecture & Planning</option>
                                        <option value="Art & Handcraft"
                                            {{ $portfolio->sector == 'Art & Handcraft' ? 'selected' : '' }}>Art &
                                            Handcraft</option>
                                        <option value="Aviation & Aerospace"
                                            {{ $portfolio->sector == 'Aviation & Aerospace' ? 'selected' : '' }}>
                                            Aviation & Aerospace</option>
                                        <option value="Construction"
                                            {{ $portfolio->sector == 'Construction' ? 'selected' : '' }}>Construction
                                        </option>
                                        <option value="E-commerce"
                                            {{ $portfolio->sector == 'E-commerce' ? 'selected' : '' }}>E-commerce
                                        </option>
                                        <option value="Education"
                                            {{ $portfolio->sector == 'Education' ? 'selected' : '' }}>Education
                                        </option>
                                        <option value="Entertainment & Events"
                                            {{ $portfolio->sector == 'Entertainment & Events' ? 'selected' : '' }}>
                                            Entertainment & Events</option>
                                        <option value="Farming"
                                            {{ $portfolio->sector == 'Farming' ? 'selected' : '' }}>Farming</option>
                                        <option value="Home Services"
                                            {{ $portfolio->sector == 'Home Services' ? 'selected' : '' }}>Home Services
                                        </option>
                                        <option value="Human Resources"
                                            {{ $portfolio->sector == 'Human Resources' ? 'selected' : '' }}>Human
                                            Resources</option>
                                        <option value="Insurance"
                                            {{ $portfolio->sector == 'Insurance' ? 'selected' : '' }}>Insurance
                                        </option>
                                        <option value="Internet"
                                            {{ $portfolio->sector == 'Internet' ? 'selected' : '' }}>Internet</option>
                                        <option value="Legal Services"
                                            {{ $portfolio->sector == 'Legal Services' ? 'selected' : '' }}>Legal
                                            Services</option>
                                        <option value="Logistics & Supply Chain"
                                            {{ $portfolio->sector == 'Logistics & Supply Chain' ? 'selected' : '' }}>
                                            Logistics & Supply Chain</option>
                                        <option value="Luxury Goods & Jewelry"
                                            {{ $portfolio->sector == 'Luxury Goods & Jewelry' ? 'selected' : '' }}>
                                            Luxury Goods & Jewelry</option>
                                        <option value="Manegement Consulting"
                                            {{ $portfolio->sector == 'Manegement Consulting' ? 'selected' : '' }}>
                                            Manegement Consulting</option>
                                        <option value="Marketing & Advertising"
                                            {{ $portfolio->sector == 'Marketing & Advertising' ? 'selected' : '' }}>
                                            Marketing & Advertising</option>
                                        <option value="Music" {{ $portfolio->sector == 'Music' ? 'selected' : '' }}>
                                            Music</option>
                                        <option value="Pets" {{ $portfolio->sector == 'Pets' ? 'selected' : '' }}>
                                            Pets</option>
                                        <option value="Political Organization"
                                            {{ $portfolio->sector == 'Political Organization' ? 'selected' : '' }}>
                                            Political Organization</option>
                                        <option value="warning"
                                            {{ $portfolio->sector == 'Restaurant' ? 'selected' : '' }}>Restaurant
                                        </option>
                                        <option value="Sports" {{ $portfolio->sector == 'Sports' ? 'selected' : '' }}>
                                            Sports</option>
                                        <option value="Storage"
                                            {{ $portfolio->sector == 'Storage' ? 'selected' : '' }}>Storage</option>
                                        <option value="Transportation"
                                            {{ $portfolio->sector == 'Transportation' ? 'selected' : '' }}>
                                            Transportation</option>
                                        <option value="Wine & Spirits"
                                            {{ $portfolio->sector == 'Wine & Spirits' ? 'selected' : '' }}>Wine &
                                            Spirits</option>
                                        <option value="Publishing"
                                            {{ $portfolio->sector == 'Publishing' ? 'selected' : '' }}>Publishing
                                        </option>
                                        <option value="Video Games"
                                            {{ $portfolio->sector == 'Video Games' ? 'selected' : '' }}>Video Games
                                        </option>
                                        <option value="Beauty" {{ $portfolio->sector == 'Beauty' ? 'selected' : '' }}>
                                            Beauty</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>Geographic scope <span>(optional)</span></h6>
                                <div class="form-group mb-4">
                                    <select class="form-control" data-select2-selector="status"
                                        name="geographic_scope">
                                        <option value="National"
                                            {{ $portfolio->geographic_scope == 'National' ? 'selected' : '' }}>National
                                        </option>
                                        <option value="International"
                                            {{ $portfolio->geographic_scope == 'International' ? 'selected' : '' }}>
                                            International</option>
                                        <option value="Local"
                                            {{ $portfolio->geographic_scope == 'Local' ? 'selected' : '' }}>Local
                                        </option>
                                    <select class="form-control" data-select2-selector="status"
                                        name="geographic_scope">
                                        <option value="National"
                                            {{ $portfolio->geographic_scope == 'National' ? 'selected' : '' }}>National
                                        </option>
                                        <option value="International"
                                            {{ $portfolio->geographic_scope == 'International' ? 'selected' : '' }}>
                                            International</option>
                                        <option value="Local"
                                            {{ $portfolio->geographic_scope == 'Local' ? 'selected' : '' }}>Local
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6> Audience <span> (optional) </span> </h6>
                            <div class="form-group mb-4">
                                <select class="form-control" data-select2-selector="status" name="audience">
                                    <option value="B2B" data-bg="bg-primary"
                                        {{ $portfolio->audience == 'B2B' ? 'selected' : '' }}>B2B</option>
                                    <option value="B2C" data-bg="bg-secondary"
                                        {{ $portfolio->audience == 'B2C' ? 'selected' : '' }}>B2C</option>
                                    <option value="B2B & B2C" data-bg="bg-success"
                                        {{ $portfolio->audience == 'B2B & B2C' ? 'selected' : '' }}>B2B & B2C</option>
                                    <option value="B2B" data-bg="bg-primary"
                                        {{ $portfolio->audience == 'B2B' ? 'selected' : '' }}>B2B</option>
                                    <option value="B2C" data-bg="bg-secondary"
                                        {{ $portfolio->audience == 'B2C' ? 'selected' : '' }}>B2C</option>
                                    <option value="B2B & B2C" data-bg="bg-success"
                                        {{ $portfolio->audience == 'B2B & B2C' ? 'selected' : '' }}>B2B & B2C</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h6> Ask this client for a review <span> (optional) </span> </h6>
                            <div class="mb-4">
                                <input type="text" class="form-control" name="client_review"
                                    placeholder="Enter a title for your work here..."
                                    value="{{ $portfolio->client_review }}">
                                <input type="text" class="form-control" name="client_review"
                                    placeholder="Enter a title for your work here..."
                                    value="{{ $portfolio->client_review }}">
                            </div>
                            <label> Confidential: The email of your client is confidential and will not be stored or
                                shown anywhere.</label>
                            <label> Confidential: The email of your client is confidential and will not be stored or
                                shown anywhere.</label>
                        </div>

                    </div>


                    <input type="hidden" name="provider_id" value="{{ auth()->user()->manager->provider_id }}">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>


    </div>
@endforeach
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
@endforeach
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->

<script>
    function showInput(type) {
        // Barcha input maydonlarini va qo'shimcha ma'lumotlarni dastlab yashirish
        document.getElementById('imageInput').style.display = 'none';
        document.getElementById('youtubeInput').style.display = 'none';
        document.getElementById('imageInputInfo').style.display = 'none';
<script>
    function showInput(type) {
        // Barcha input maydonlarini va qo'shimcha ma'lumotlarni dastlab yashirish
        document.getElementById('imageInput').style.display = 'none';
        document.getElementById('youtubeInput').style.display = 'none';
        document.getElementById('imageInputInfo').style.display = 'none';

        // Tanlangan input maydoni va tugma dizaynini ko'rsatish
        if (type === 'image') {
            document.getElementById('imageInput').style.display = 'block';
            document.getElementById('imageInputInfo').style.display = 'block';
            document.getElementById('imageFile').click(); // Fayl yuklash dialogini avtomatik ochish
        } else if (type === 'youtube') {
            document.getElementById('youtubeInput').style.display = 'block';
        }
    }
</script>
        // Tanlangan input maydoni va tugma dizaynini ko'rsatish
        if (type === 'image') {
            document.getElementById('imageInput').style.display = 'block';
            document.getElementById('imageInputInfo').style.display = 'block';
            document.getElementById('imageFile').click(); // Fayl yuklash dialogini avtomatik ochish
        } else if (type === 'youtube') {
            document.getElementById('youtubeInput').style.display = 'block';
        }
    }
</script>

<style>
    .sticky-column {
        position: -webkit-sticky;
        /* Safari uchun */
        position: sticky;
        top: 0;
        /* Ekran yuqorisidan qanchalik uzoqda bo'lishini belgilaydi */
        /* Agar kerak bo'lsa, boshqa uslublarni qo'shing */
        height: 100vh;
        /* Bo'lim balandligini ekran balandligi bilan moslashtiradi */
        overflow: auto;
        /* Agar bo'lim juda uzun bo'lsa, scroll bo'lishini ta'minlaydi */
    }
</style>

<style>
    .sticky-column {
        position: -webkit-sticky;
        /* Safari uchun */
        position: sticky;
        top: 0;
        /* Ekran yuqorisidan qanchalik uzoqda bo'lishini belgilaydi */
        /* Agar kerak bo'lsa, boshqa uslublarni qo'shing */
        height: 100vh;
        /* Bo'lim balandligini ekran balandligi bilan moslashtiradi */
        overflow: auto;
        /* Agar bo'lim juda uzun bo'lsa, scroll bo'lishini ta'minlaydi */
    }
</style>
