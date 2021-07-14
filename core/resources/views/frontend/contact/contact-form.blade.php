<form method="POST" action="{{ route('save.contact') }}"
                                                class="form-horizontal" role="form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group has-float-label">
                                                            <input id="name" class="form-control" name="name"
                                                                placeholder="Name *" value="{{ old('name') }}"
                                                                type="text">
                                                            <label for="name">Name *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group has-float-label">
                                                            <input id="email" class="form-control" name="email"
                                                                placeholder="Email *" value="{{ old('email') }}"
                                                                type="email">
                                                            <label for="email">Email *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group has-float-label">
                                                            <input id="phone" class="form-control" name="phone"
                                                                placeholder="Phone *" value="{{ old('phone') }}"
                                                                type="number">
                                                            <label for="phone">Phone *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group textarea_group">
                                                    <div class="inputGroupContainer">
                                                        <div class="input-group">
                                                            <textarea class="form-control border-group" name="message"
                                                                rows="3" cols="6"
                                                                placeholder="Type your message here.">{{ old('message') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--SEND Button-->
                                                <div class="form-group text-center button_group">
                                                    <label class="col-sm-2 control-label"></label>
                                                    <div class="">
                                                        <button type="submit" class="btn">Send Message<span
                                                                class="glyphicon glyphicon-send"></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
