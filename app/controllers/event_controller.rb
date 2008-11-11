class EventController < ApplicationController
    def show
	    if id = params[:id] 
		    @activity = Activity.find(id)
			@my_activity = @current_user.my_activity_find_by_id(id)
			@join_user = []
		    i = 0
		    @activity.join_user.each do |u| 
				i += 1
				if i > 6 
				   break
				end
				@join_user << SnsUser.find(u.sns_user_id).xid
		    end
			@message = @activity.sns_commit
		 end
	end
	def userlist
	    if id = params[:id]
			@activity = Activity.find(id)
		    @userlist = @activity.sns_user
		end
	end
	def message
	    if id = params[:id]
			@activity = Activity.find(id)
		    @message = @activity.sns_commit
		end
	end
	def save_message
	    commit = params[:commit]
		if !commit[:content].blank? and commit[:content].length <1000  #������������
		    commit[:sns_user_xid] = @current_user.xid
			SnsCommit.create(commit)
		end
		xn_redirect_to("event/show/#{commit[:activity_id]}")
	end
	def share
		if id = params[:id] 
		      my_activity = @current_user.my_activity_find_by_id(id)
		      if my_activity
			       my_activity.share = true
				   my_activity.save
			  else   
			       @current_user.sns_my_activity.create(:activity_id =>id,:share => true)
			  end
		end
		xn_redirect_to("event/show/#{id}")
	end
	def join
        if id = params[:id] 
		      my_activity = @current_user.my_activity_find_by_id(id)
		      if my_activity
			       my_activity.join = true
				   my_activity.save
			  else   
			       @current_user.sns_my_activity.create(:activity_id =>id,:join => true)
			  end
		end
		xn_redirect_to("event/show/#{id}")
	end
	def interest
        if id = params[:id] 
		      my_activity = @current_user.my_activity_find_by_id(id)
		      if my_activity
			       my_activity.interest = true
				   my_activity.save
			  else   
			       @current_user.sns_my_activity.create(:activity_id =>id,:interest => true)
			  end
		end
		xn_redirect_to("event/show/#{id}")
	end
	def unjoin
        if id = params[:id] 
		      my_activity = @current_user.my_activity_find_by_id(id)
		      if my_activity
			       my_activity.join = false
				   my_activity.save
			  end
		end
		xn_redirect_to("event/show/#{id}")
	end
	def uninterest
	    if id = params[:id] 
		      my_activity = @current_user.my_activity_find_by_id(id)
		      if my_activity
			       my_activity.interest = false
				   my_activity.save
			  end
		end
		xn_redirect_to("event/show/#{id}")
	end
end
