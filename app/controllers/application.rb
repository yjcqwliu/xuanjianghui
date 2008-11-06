# Filters added to this controller apply to all controllers in the application.
# Likewise, all the methods added will be available for all controllers.

class ApplicationController < ActionController::Base
  require "pp"
  helper :all # include all helpers, all the time
  
  # See ActionController::RequestForgeryProtection for details
  # Uncomment the :secret if you're not using the cookie session store
  #protect_from_forgery # :secret => '7982602486defa6700eb432a7a0095d7'
  
  # See ActionController::Base for details 
  # Uncomment this to filter the contents of submitted sensitive data parameters
  # from your application log (in this case, all fields with names like "password"). 
  # filter_parameter_logging :password
  #platform = "xiaonei"
     
  #require  "platform/#{platform}.rb"
  acts_as_xiaonei_controller
  
      before_filter :set_current_user
   
  def set_current_user
	  	    
	
			if @current_user.nil?
			  @current_user = SnsUser.find_by_xid(xiaonei_session.user)
			  if @current_user.session_key != xiaonei_session.session_key
			  @current_user.session_key = xiaonei_session.session_key
			   #@current_user.save
			  end
			end
			
			tem_friend_ids = @current_user.friend_ids
			if tem_friend_ids.blank? or tem_friend_ids.type == String or @current_user.updated_at < (Time.now - 48.hour) 
			pp("-----------use friends API---------")
				res = xiaonei_session.invoke_method("xiaonei.friends.get")
			    if res.kind_of? Xiaonei::Error
				  @current_user.friend_ids = [] if @current_user.friend_ids.blank?
				else
				  @current_user.friend_ids = res
				end
			else
			pp("-----------didn't use friends API---------")
			end
			@current_user.friend_ids_will_change!
			@current_user.save
  end
  
  def current_user
    @current_user
  end
  
  def xn_redirect_to(to_url,feilds={})
    path = "#{to_url}?"
        feilds.each do |key,value|
	     path += "#{key}=#{URI.escape(value)}&"
        end
    render :text => "<xn:redirect url=\"#{path}\"/>"
  end

end
