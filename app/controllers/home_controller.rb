class HomeController < ApplicationController
	before_filter :check_network, :except => [:network,:save_network]
	def index
        @act_location = @current_user.act_location
		if search_key = params[:keywords]
		    pp "---------search_key:#{search_key}-------------"
			@activity = @current_user.location_activity(" and act_subject like '%#{search_key}%'")
		else
		    @activity = @current_user.location_activity
		end
		#pp "-------current_user.activity#{current_user.activity.inspect}----"
	end
	def allcity
        #@act_location = 
		@activity = Activity.find(:all)
		render :action => :index
	end
	def network
	    
	end
	def save_network
	    begin
		    pp("------------params[:city]:#{params[:city]}------")
		    @current_user.act_location = params[:city]
			@current_user.save
			xn_redirect_to("home/index")
		rescue
		    xn_redirect_to("home/network")
		end
	end
	private
	def check_network
		if @current_user.act_location.blank?
			xn_redirect_to("home/network")
		end
	end

end
